<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
View-Chat
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Chat Messages</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Chat Messages</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>


  <section class="chatbtwstandcu">
    <div class="container">

      <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-12 col-xl-12">

          <div class="card" id="chat1" style="border-radius: 15px;">
            <div class="card-header m-0">
              <div class="row">
                <div class="col-lg-8">
                  <div class="d-flex align-items-center m-2">
                    <img
                      src="<?= config('App')->baseURL2 ?>/public/images/<?= !empty($receiver['profile']) ? $receiver['profile'] : 'user-profile.jpg' ?>"
                      height="50" width="50" class="rounded rounded-circle me-2 border border-light border-2"
                      onerror="this.onerror=null; this.src='<?= config('App')->baseURL2 ?>/public/images/default.jpg';">
                    <h5 class="card-title mb-0"><?= $receiver['fullname'] ?></h5>
                  </div>
                </div>
                <div class="col-lg-4 text-end ">
                  <h5 class="card-title chatback m-2">
                    <a href="<?= base_url() . '' . session('prefix') . '/' . 'chats' ?>"> Back </a>
                  </h5>
                </div>
              </div>

            </div>
            <pre>
                <?php
                // print_r($messages)
                ?>
              </pre>
            <div class="card-body">
              <?php if (isset($messages) && !empty($messages)): ?>
                <?php foreach ($messages as $message): ?>
                  <?php if ($message['receiver_id'] == $receiverID || $message['sender_id'] == $receiverID): ?>
                    <div
                      class="d-flex flex-row <?= $message['sender_id'] == session('user_id') ? 'justify-content-end' : 'justify-content-start' ?> mb-4">
                      <div class="cust-chat" style="max-width:50%;">
                        <?php if (!empty($message['files'])): ?>
                          <div class="message-files mb-2">
                            <?php
                            $files = json_decode($message['files']);
                            foreach ($files as $file):
                              if (pathinfo($file, PATHINFO_EXTENSION) == 'jpg' || pathinfo($file, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($file, PATHINFO_EXTENSION) == 'png' || pathinfo($file, PATHINFO_EXTENSION) == 'gif') {
                                // Handle images
                                ?>
                                <a href="<?= config('App')->baseURL2 ?>/public/chat_files/<?= $file ?>"
                                  data-lightbox="image-<?= $message['id'] ?>">
                                  <img src="<?= config('App')->baseURL2 ?>/public/chat_files/<?= $file ?>"
                                    class="img-thumbnail m-1" style="width: 50px; height: 50px;">
                                </a>

                              <?php } elseif (pathinfo($file, PATHINFO_EXTENSION) == 'pdf') {
                                // Handle PDFs
                                ?>
                                <br>
                                <a href="<?= config('App')->baseURL2 ?>/public/chat_files/<?= $file ?>" target="_blank"
                                  class="m-1 text-light">
                                  PDF File (<?= $file ?>)
                                </a>
                                
                              <?php } elseif (pathinfo($file, PATHINFO_EXTENSION) == 'mp4' || pathinfo($file, PATHINFO_EXTENSION) == 'avi' || pathinfo($file, PATHINFO_EXTENSION) == 'mov') {
                                // Handle videos
                                ?>
                                <video controls class="m-1 rounded" style="max-width: 100%; min-width: 100%;">
                                  <source src="<?= config('App')->baseURL2 ?>/public/chat_files/<?= $file ?>"
                                    type="video/mp4">
                                  Your browser does not support the video tag.
                                </video>
                                <br>
                              <?php } ?>
                            <?php endforeach; ?>
                          </div>
                        <?php endif; ?>

                        <?php if (!empty($message['messages'])): ?>
                          <p class="mb-0 m-0 p-0 "><?= $message['messages'] ?></p>
                        <?php endif; ?>

                        <?php
                        $date = new DateTime($message['created_at']);
                        $formattedDate = $date->format('d M Y, h:i A');
                        ?>

                        <div
                          class="m-0 p-0 <?= $message['sender_id'] == session('user_id') ? 'float-end' : 'float-start' ?> d-block"
                          style="color:darkgray; font-size:10px;">
                          <?= $formattedDate ?>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>



            <div class="card-footer text-muted d-flex justify-content-start align-items-center">

              <div class="input-group mb-0">
                <input type="hidden" name="receiverID" value="<?= $receiverID ?>" id="receiverID">
                <input type="hidden" name="senderID" value="<?= session('user_id') ?>" id="senderID">

                <button class="btn btn-secondary send-btn rounded " type="button" id="file-addon"
                  onclick="document.getElementById('fileInput').click();">
                  <i class="bi bi-paperclip"></i><span id="file-count" class="fw-bold"></span>
                </button>
                <input type="file" id="fileInput" style="display: none;" multiple>

                <input type="text" id="msgtext" class="form-control rounded" placeholder="Type message...">
                <button class="btn btn-primary send-btn rounded" type="button" id="msg_send">
                  <i class="bi bi-send"></i>
                </button>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

</main><!-- End #main -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
<script>

document.getElementById('fileInput').addEventListener('change', function () {
    const files = this.files;
    const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
    const allowedVideoTypes = ['video/mp4', 'video/avi', 'video/mov'];
    const allowedPdfTypes = ['application/pdf'];
    const maxFileSize = 10 * 1024 * 1024; // 10MB

    let validFiles = true;
    let fileType = '';

    for (let i = 0; i < files.length; i++) {
        const file = files[i];

        if (allowedImageTypes.includes(file.type)) {
            if (fileType === '' || fileType === 'image') {
                fileType = 'image';
            } else {
                showToastError('Select only one type of files.');
                this.value = '';
                validFiles = false;
                break;
            }
        } else if (allowedVideoTypes.includes(file.type)) {
            if (fileType === '' || fileType === 'video') {
                fileType = 'video';
            } else {
                showToastError('Select only one type of files.');
                this.value = '';
                validFiles = false;
                break;
            }
        } else if (allowedPdfTypes.includes(file.type)) {
            if (fileType === '' || fileType === 'pdf') {
                fileType = 'pdf';
            } else {
                showToastError('Select only one type of files.');
                this.value = '';
                validFiles = false;
                break;
            }
        } else {
            showToastError('Only Image, Video, and PDF files are allowed.');
            this.value = '';
            validFiles = false;
            break;
        }

        if (file.size > maxFileSize) {
            showToastError('File size exceeds the limit of 10MB.');
            this.value = '';
            validFiles = false;
            break;
        }
    }

    if (validFiles) {
        document.getElementById('file-count').textContent = `${files.length}`;
    } else {
        // document.getElementById('file-count').textContent = 'Invalid file selection';
    }
});

  $(document).ready(function () {

    scrollToBottom()

    function formatDate(dateString) {
      let date = new Date(dateString);
      let day = date.getDate();
      let month = date.toLocaleString('default', { month: 'short' });
      let year = date.getFullYear();
      let hours = date.getHours();
      let minutes = date.getMinutes();
      let ampm = hours >= 12 ? 'PM' : 'AM';

      hours = hours % 12;
      hours = hours ? hours : 12;

      minutes = minutes < 10 ? '0' + minutes : minutes;

      let formattedDate = `${day} ${month} ${year}, ${hours}:${minutes} ${ampm}`;
      return formattedDate;
    }

    let receiverID = $('#receiverID').val();
    let senderID = $('#senderID').val();

    $(document).on('click', '#msg_send', function (e) {
      e.preventDefault();
      sendMessage(receiverID, senderID);
    });

    function scrollToBottom() {
      const chatBody = $('.card-body');
      chatBody.animate({ scrollTop: chatBody[0].scrollHeight }, 1000);
    }

    function sendMessage(receiverID, senderID) {
      let msg = $('#msgtext').val();
      let fileInput = document.getElementById('fileInput');
      let files = fileInput.files;

      if (msg.trim() === '' && files.length === 0) {
        $('#msgtext').focus();
        return;
      }

      let formData = new FormData();
      formData.append('message', msg);
      formData.append('receiver_id', receiverID);
      formData.append('sender_id', senderID);

      for (let i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
      }

      $.ajax({
        url: '<?= base_url() . '' . session('prefix') . '/' . 'send_message' ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          if (response.status === 200) {
            let newMessage = response.data;
            let mediaHtml = '';

            if (newMessage.files) {
              let filesArray = JSON.parse(newMessage.files);
              filesArray.forEach(file => {
                if (file.endsWith('.jpg') || file.endsWith('.jpeg') || file.endsWith('.png') || file.endsWith('.gif')) {
                  // Handle images
                  mediaHtml += `
                                <a href="<?= config('App')->baseURL2 ?>/public/chat_files/${file}" data-lightbox="image-${newMessage.id}">
                                    <img src="<?= config('App')->baseURL2 ?>/public/chat_files/${file}" class="img-thumbnail m-1" style="width: 50px; height: 50px;">
                                </a>
                              
                            `;
                } else if (file.endsWith('.pdf')) {
                  // Handle PDFs
                  mediaHtml += `<br>
                                <a href="<?= config('App')->baseURL2 ?>/public/chat_files/${file}" target="_blank" class="m-1 text-light">
                                    PDF File (${file})
                                </a>
                                
                                
                            `;
                } else if (file.endsWith('.mp4') || file.endsWith('.avi') || file.endsWith('.mov')) {
                  // Handle videos
                  mediaHtml += `
                                <video controls class="m-1 rounded" style="max-width: 100%; min-width: 100%;">
                                    <source src="<?= config('App')->baseURL2 ?>/public/chat_files/${file}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <br>
                            `;
                }
              });
            }

            $('#msgtext').val('');
            document.getElementById('file-count').textContent = '';
            fileInput.value = '';
            $('.card-body').append(`
                    <div class="d-flex flex-row justify-content-end p-1">
                        <div class="cust-chat" style="max-width:50%;">
                            ${mediaHtml ? `<p>${mediaHtml}</p>` : ''}
                            <p class="mb-0">${newMessage.messages}</p>
                            <small class="m-0 p-0 float-end" style="color:darkgray; font-size:10px;">
                                ${formatDate(newMessage.created_at)}
                            </small>
                        </div>
                    </div>
                `);
            scrollToBottom();
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error('Error sending message:', textStatus, errorThrown);
        }
      });
    }

    // checkNewMessages(receiverID)
    function checkNewMessages(receiverID) {
      $.ajax({
        url: '<?= base_url() . '' . session('prefix') . '/' . 'get_live_message' ?>',
        type: 'POST',
        data: { receiver_id: receiverID },
        success: function (response) {
          if (response.status === 200) {
            let newMessages = response.data;
            newMessages.forEach(message => {
              let imgHtml = '';
              if (message.files) {
                let filesArray = JSON.parse(message.files);
                filesArray.forEach(file => {
                  if (file.endsWith('.jpg') || file.endsWith('.jpeg') || file.endsWith('.png') || file.endsWith('.gif')) {
                    // Handle images
                    imgHtml += `
                                    <a href="<?= config('App')->baseURL2 ?>/public/chat_files/${file}" data-lightbox="image-${message.id}">
                                        <img src="<?= config('App')->baseURL2 ?>/public/chat_files/${file}" class="img-thumbnail m-1" style="width: 50px; height: 50px;">
                                    </a>
                                   

                                `;
                  } else if (file.endsWith('.pdf')) {
                    // Handle PDFs
                    imgHtml += ` <br>
                                    <a href="<?= config('App')->baseURL2 ?>/public/chat_files/${file}" target="_blank" class="m-1 text-light">
                                        PDF File (${file})
                                    </a>
                                   
                                `;
                  } else if (file.endsWith('.mp4') || file.endsWith('.avi') || file.endsWith('.mov')) {
                    // Handle videos
                    imgHtml += `
                                    <video controls class="m-1 rounded" style="max-width: 100%; min-width: 100%;">
                                        <source src="<?= config('App')->baseURL2 ?>/public/chat_files/${file}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <br>
                                `;
                  }
                });
              }

              $('.card-body').append(`
                        <div class="d-flex flex-row justify-content-start p-1">
                            <div class="cust-chat" style="max-width:50%;">
                                ${imgHtml ? `<p>${imgHtml}</p>` : ''}
                                
                                <p class="mb-0 ">${message.messages}</p>
                                <small class="m-0 p-0 float-start" style="color:darkgray; font-size:10px;">
                                    ${formatDate(message.created_at)}
                                </small>
                            </div>
                        </div>
                    `);
              scrollToBottom();
            });
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error('Error fetching new messages:', textStatus, errorThrown);
        }
      });
    }

    setInterval(function () {
      checkNewMessages(receiverID);
    }, 1000);




  });

</script>

<?= $this->endSection() ?>