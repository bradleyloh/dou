<!DOCTYPE html>

<head>
  <title>Contact Us</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Quicksand" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css">
  <link rel="stylesheet" href="../src/css/main.css">
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
            <input type="text" id="name" name="name" required />
          </div>

          <div class="field-set required">
            <label for="contact">Contact</label>
            <input type="tel" id="contact" name="contact" required />
          </div>

          <div class="field-set">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="10"></textarea>
          </div>

          <button type="submit" class="primary">Send email</button>
        </form>
      </div>
    </div>

    <div class="faq">
      <div class="wrapper">
        <h2>FAQ</h2>
        <p>Commonly asked questions</p>

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
<script>
  const items = document.querySelectorAll(".accordion-header");

  function toggleAccordion() {
    const itemToggle = this.getAttribute('aria-expanded');

    for (i = 0; i < items.length; i++) {
      items[i].setAttribute('aria-expanded', 'false');
      items[i].parentElement.classList.remove("expanded");
    }

    if (itemToggle == 'false') {
      this.setAttribute('aria-expanded', 'true');
      this.parentElement.classList.add("expanded");
    }
  }

  items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>

</html>