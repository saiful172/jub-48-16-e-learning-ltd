<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.min.css">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">
<meta name="facebook-domain-verification" content="cpnggbil6pp8t1ssfwzajtvmvqqeln" />
<!-- Meta Pixel Code -->

<style>
  .video-play-button {
    position: absolute;
    z-index: 10;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    box-sizing: content-box;
    display: block;
    width: 10px;
    height: 22px;
    /* background: #fa183d; */
    border-radius: 50%;
    padding: 0;
    /* padding: 18px 20px 18px 28px; */
  }

  .video-play-button:focus {
    border: none !important;
    outline: none !important;
  }

  .video-play-button:before {
    content: "";
    position: absolute;
    z-index: 0;
    left: 50%;
    top: 50%;
    transform: translateX(-50%) translateY(-50%);
    display: block;
    width: 60px;
    height: 60px;
    background: #ba1f24;
    border-radius: 50%;
    -webkit-animation: pulse-border 1500ms ease-out infinite;
    animation: pulse-border 1500ms ease-out infinite;
  }

  .video-play-button:after {
    content: "";
    position: absolute;
    z-index: 1;
    left: 50%;
    top: 50%;
    transform: translateX(-50%) translateY(-50%);
    display: block;
    width: 60px;
    height: 60px;
    background: #fa183d;
    border-radius: 50%;
    transition: all 200ms;
  }

  .video-play-button:hover:after {
    background-color: #da0528;
  }

  .video-play-button img {
    position: relative;
    z-index: 3;
    max-width: 100%;
    width: auto;
    height: auto;
  }

  .video-play-button span {
    display: block;
    position: relative;
    z-index: 3;
    width: 0;
    height: 0;
    border-left: 18px solid #fff;
    border-top: 12px solid transparent;
    border-bottom: 12px solid transparent;
  }

  @-webkit-keyframes pulse-border {
    0% {
      transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
      opacity: 1;
    }

    100% {
      transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
      opacity: 0;
    }
  }

  @keyframes pulse-border {
    0% {
      transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
      opacity: 1;
    }

    100% {
      transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
      opacity: 0;
    }
  }

  iframe {
    display: block;
    width: 100%;
    max-width: 100%;
  }


  .modal .close {
    position: absolute;
    top: -20px;
    right: -20px;
    background: #1bbd36;
    width: 40px;
    height: 40px;
    border-radius: 50px;
    opacity: 1;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .modal .close:focus {
    outline: none !important;
  }

  .modal .close:hover {
    opacity: 1 !important;
  }

  .modal .close span {
    color: #fff;
    font-weight: normal;
    font-size: 22px;
    text-shadow: none !important;
  }

  .video-content {
    width: 100%;
    height: 291px;
  }

  .video-content>img {
    opacity: .8;
    width: 100%;
    height: 100%;
  }
</style>

<script>
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '606004760491665');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=606004760491665&ev=PageView&noscript=1" /></noscript>
<!-- End Meta Pixel Code -->