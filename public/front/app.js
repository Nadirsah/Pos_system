const navLinks = [...document.querySelectorAll(".navbar li")];
navLinks.map((link) => {
  link.addEventListener("click", () => {
    navLinks.map((x) => {
      if (x.classList.contains("active")) {
        x.classList.remove("active");
      }
      link.classList.add("active");
    });
  });
});

let headliners = [...document.querySelectorAll(".info-nav li")];

headliners.map((x) => {
  x.addEventListener("click", () => {
    headliners.map((k) => {
      if (k.classList.contains("active-banner")) {
        k.classList.remove("active-banner");
      }
      x.classList.add("active-banner");
    });
  });
});

const cityT =
  "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged";

const peopleT =
  "t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.";

const areaT =
  "t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.";

let city = document.getElementById("city");
let area = document.getElementById("area");
let people = document.getElementById("people");
let width = 50;
document.querySelector(".bar-line").style.width = "50%";
let newWidth = 0;
city.addEventListener("click", () => {
  document
    .getElementById("area-photo")
    .setAttribute("src", "img/Rectangle 410.png");
  while (width != newWidth) {
    width--;
    document.querySelector(".bar-line").style.width = width + "%";
  }
  document.getElementById("change-text").textContent = cityT;
});
area.addEventListener("click", () => {
  document.getElementById("area-photo").setAttribute("src", "img/Nax-MR 1.png");
  document.getElementById("change-text").textContent = areaT;
  const old = document.querySelector(".bar-line").style.width;
  if (width < 50) {
    while (width != 50) {
      width++;
      document.querySelector(".bar-line").style.width = width + "%";
    }
  } else if (width > 50) {
    while (width != 50) {
      width--;
      document.querySelector(".bar-line").style.width = width + "%";
    }
  } else {
    return;
  }
});
people.addEventListener("click", () => {
  document
    .getElementById("area-photo")
    .setAttribute("src", "img/Rectangle 409.png");
  document.getElementById("change-text").textContent = peopleT;
  if (width < 100) {
    while (width != 100) {
      width++;
      document.querySelector(".bar-line").style.width = width + "%";
    }
  } else if (width > 100) {
    width--;
    document.querySelector(".bar-line").style.width = width + "%";
  } else {
    return;
  }
});

let sliderImages = [...document.querySelectorAll(".display-1 img")];
sliderImages.map((x) => {
  x.parentElement.addEventListener("click", () => {
    const div = document.createElement("div");
    close = document.createElement("button");
    close.textContent = "close";
    close.setAttribute("id", "close-btn");
    div.setAttribute("id", "fix-pic");
    const image = document.createElement("img");
    image.setAttribute("src", x.getAttribute("src"));
    image.classList.add("fixed");
    div.append(image);
    document.querySelector(".photo-gallery").append(div);
    document.querySelector(".photo-gallery").append(close);
    close.addEventListener("click", (e)=> {
      close.remove()
      document.querySelector("#fix-pic").remove()

      
    })
  });
});

console.log(document.querySelector(".imgs"));
