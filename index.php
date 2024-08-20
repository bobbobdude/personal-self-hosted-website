<!DOCTYPE html>
<html lang="en-US">

<head>
  <?php include "favicon.php"; ?>
  <link rel="stylesheet" href="styles/styles.css">


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta
    name="description"
    content="A small website detailing my (Tom G's) achievements as a developer. A warm welcome to you!">
  <meta name="author" content="Thomas Gardner">

  <title>Tom's Developer Profile</title>
</head>



<body>
  <header><?php include "nav.php"; ?></header>
  <h1 class="center">My Developer Profile</h1>
  <div class="logo-container">
    <a href="https://github.com/bobbobdude">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="svg-logo">
        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
      </svg>
    </a>
    <a href="https://www.linkedin.com/in/thomas-gardner-robert/">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="svg-logo">
        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
      </svg>
    </a>
    <a href="mailto:thomasrobertgardner1056@gmail.com">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="svg-logo">
        <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z" />
      </svg>
    </a>
  </div>
  <p>
    Hey! I'm Tom, a developer that lives in Stockholm. I've made projects in
    Rust, Python and Javascript but I would consider Java my speciality.
  </p>
  <p>Some of my projects include...</p>
  <ul>
    <li>A cache simulator using Rust with Valgrind trace files!</li>
    <li>
      A group project where we created custom path finding algorithms using
      Java!
    </li>
    <li>
      A custom, user configurable chess game that just about functions in
      Python!
    </li>
    <li>
      This website is hosted on a Raspberry Pi that I set up myself, your
      computer is connected to something inside my apartment right now! Take
      that AWS. Read about the process on my GitHub repo
      <a href="https://github.com/bobbobdude/personal-self-hosted-website">here</a>!
    </li>
  </ul>
  <p>
    And many, many more! Also massive thanks to Idun who is simply the best.
  </p>

  <div class="pictures_container">
    <figure>
      <img
        src="images/tom-serious-with-rpi.jpg"
        alt="A ginger man with a serious demeanour pointing to a Raspberry Pi mounted on a pegboard"
        class="pictures">
      <figcaption>
        Fig.1 - Me taking a serious picture pointing to my serious server
      </figcaption>
    </figure>
    <figure>
      <img
        src="images/tom-smiling-with-rpi.jpg"
        alt="A ginger man smiling while pointing to a Raspberry Pi mounted on a pegboard"
        class="pictures">
      <figcaption>
        Fig. 2 - Me after my server told me an inside joke (you wouldn't get it)
      </figcaption>
    </figure>
  </div>
</body>
</html>