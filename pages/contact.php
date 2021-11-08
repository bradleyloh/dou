<!DOCTYPE html>

<head>
  <title>Dou! - Contact Us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../src/css/main.css">
  <link href="../src/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body class="page-contact">
  <?php require '../components/header.php';

  if ($_POST["message"]) {
    $insert = "INSERT INTO message(`name`, `contact`, `message`) VALUES ('$_POST[name]', '$_POST[contact]', '$_POST[message]')";
    $conn->query($insert);
  }

  $topic_query = "SELECT * FROM faqTopic";
  $topics = $conn->query($topic_query);


  ?>

  <div class="main-content">

    <div class="contact">
      <div class="wrapper">
        <h2>Get in Touch</h2>
        <p>Send us a message</p>
        <form action="contact.php" method="post" class="contact-form">
                <div class="field-set required">
                  <label for="name">Name</label>
                  <input type="text"  name="name" id="name" placeholder="Enter your name" required />
                </div>

                <div class="field-set required">
                  <label for="contact">Contact</label>
                  <input type="tel" id="contact" name="contact" placeholder="Enter your phone number" required />
                </div>

                <div class="field-set required">
                  <label for="message">Message</label>
                  <textarea id="message" name="message" rows="10" placeholder="Enter your enquiry" required></textarea>
                </div>

                <button type="submit" class="primary">Send email</button>
        </form>
      </div>
    </div>

    <div class="faq">
      <div class="wrapper">
        <h2>FAQ</h2>
        <p>Frequently asked questions</p>

        <?php
        if ($topics->num_rows > 0) {
          while ($topic = $topics->fetch_assoc()) {
        ?>
            <div class="faq-section scroll-element">
              <h3><?php echo $topic["topic"]; ?></h3>
              <div class="accordion">
                <?php
                $faq_query = "SELECT * FROM faq WHERE topicId=$topic[id]";
                $faqs = $conn->query($faq_query);

                if ($faqs->num_rows > 0) {
                  while ($faq = $faqs->fetch_assoc()) {
                ?>
                    <div class="accordion-item">
                      <div class="accordion-header" aria-expanded="false"><?php echo $faq["question"]; ?> <span class="material-icons">
                          expand_more
                        </span>
                      </div>
                      <div class="accordion-content">
                        <p><?php echo $faq["answer"]; ?></p>
                      </div>
                    </div>
                <?php }
                } ?>
              </div>
            </div>
        <?php }
        } ?>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>

  <?php require '../components/footer.php' ?>
</body>

<script type="text/javascript" src="../js/faq.js"></script>


</html>