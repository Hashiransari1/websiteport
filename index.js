  document.addEventListener("DOMContentLoaded", function () {
      const menuIcon = document.querySelector(".menu-icon");
      const navbar = document.querySelector(".navbar");
      menuIcon.addEventListener("click", function () {
        navbar.style.display = navbar.style.display === "block" ? "none" : "block";
      });
    });


    document.addEventListener("DOMContentLoaded", function () {
    var typed = new Typed(".text", {
      strings: ["Frontend Developer", "Youtuber", "Web Developer", "Graphic Designing"],
      typeSpeed: 100,
      backSpeed: 100,
      backDelay: 1000,
      loop: true
    });

    const menuIcon = document.querySelector(".menu-icon");
    const navbar = document.querySelector(".navbar");

    menuIcon.addEventListener("click", function () {
      menuIcon.classList.toggle("active");
      navbar.classList.toggle("active");
    });
    
    const navLinks = document.querySelectorAll(".navbar a");
    navLinks.forEach(link => {
      link.addEventListener("click", () => {
        menuIcon.classList.remove("active");
        navbar.classList.remove("active");
      });
    });
  });

