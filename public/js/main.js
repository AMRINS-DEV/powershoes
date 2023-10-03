let INPUT = document.querySelector("#file_input");
const item = document.querySelector("#addImage__lable");
const gallery = document.querySelector(".gallery");
function DDImage() {
  let array = ["dragover", "drop", "dragstart", "dragleave"];
  array.forEach((event) => {
    document.addEventListener(
      event,
      function (e) {
        e.preventDefault();
        e.stopPropagation();
      },
      false
    );
  });
  item.addEventListener(
    "dragover",
    function (e) {
      e.preventDefault();
      e.stopPropagation();
      item.classList.add("active");
    },
    false
  );
  item.addEventListener(
    "drop",
    function (e) {
      e.preventDefault();
      e.stopPropagation();
      INPUT.files = e.dataTransfer.files;
      item.classList.remove("active");

      fileManager(INPUT.files);
    },
    false
  );
  INPUT.addEventListener("input", function (e) {
    item.classList.remove("active");
    fileManager(this.files);
  });

  item.addEventListener(
    "click",
    function (e) {
      item.classList.add("active");
    },
    false
  );

  function fileManager(files) {
    gallery.innerHTML = "";
    function display(imgurl, filesLength) {
      let img = new Image();
      img.src = imgurl;
      gallery.appendChild(img);
      progress.value += 100 / filesLength;
    }
    let dt = [];

    for (let i = 0; i < files.length; i++) {
      const reader = new FileReader();
      reader.readAsDataURL(files[i]);
      reader.onload = function () {
        display(reader.result, files.length);
        dt.push({ image_data: reader.result });
      };
    }
  }
}
if (gallery && INPUT && item) DDImage();
// --------------------------------------------

let size__inputs_wrapper = document.getElementById("size__inputs_wrapper");
let size__add_button = document.getElementById("size__add_button");
function sddMewSize() {
  if (document.getElementById("size__inputs_wrapper")) {
    const template = `
      <div class="size__input_container d-flex align-items-center flex-column border border-2 border-secondary m-1">
        <div id="size__input_wrapper">
            <div class="d-flex align-items-center  flex-column border-secondary">
                <input placeholder="size" class="p-1 size_input border-secondary border" style="width: 100px" type="number" step="any" name="product_size[]">
                <input placeholder="quantity" class="p-1 quantitie_input border-secondary border" style="width: 100px" type="number"  step="any" name="product_quantity[]">
            </div>
        </div> 
    
        <div class="size__remove_button_wrapper d-flex align-items-center  justify-content-center w-100" >
            <button class="size__remove_button btn rounded-0 bg-secondary w-100 h-100" onclick='remove_size(this.parentNode.parentNode)'>
                <i class="fa-light fa-trash" style="color: #fff; font-size: 1.1rem"></i>
            </button>
        </div>
        </div>
    `;
    if (size__add_button) {
      size__add_button.addEventListener("click", function () {
        let newEl = document.createElement("div");
        newEl.innerHTML = template;
        size__inputs_wrapper.appendChild(newEl);
      });
    }
  }
}
if (size__inputs_wrapper && size__add_button) sddMewSize();

function remove_size(el) {
  el.remove();
}
// --------------------------------------------

if (document.querySelector(".popupmsg")) {
  document.querySelector(".popupmsg").onclick = function () {
    this.style.display = "none";
  };
}
// ----------------- Prevent to send form on clicking ENTER button

window.addEventListener(
  "keydown",
  function (e) {
    if (
      e.keyIdentifier == "U+000A" ||
      e.keyIdentifier == "Enter" ||
      e.keyCode == 13
    ) {
      if (e.target.nodeName == "INPUT" && e.target.type == "text") {
        e.preventDefault();

        return false;
      }
    }
  },
  true
);

// --------------------------------------------

function Carousel(CONTAINER) {
  const carousel = CONTAINER.querySelector("#Carousel");
  const left = CONTAINER.querySelector("#Left");
  const right = CONTAINER.querySelector("#Right");
  const carouselChildrens = [...carousel.children];
  const firstCardWidth = carouselChildrens[0].offsetWidth;

  // Get the number of cards that can fit in the carousel at once
  let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

  // Insert copies of the last few cards to beginning of carousel for infinite scrolling
  carouselChildrens
    .slice(-cardPerView)
    .reverse()
    .forEach((card) => {
      carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });

  // Insert copies of the first few cards to end of carousel for infinite scrolling
  carouselChildrens.slice(0, cardPerView).forEach((card) => {
    carousel.insertAdjacentHTML("beforeend", card.outerHTML);
  });

  // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
  carousel.classList.add("no-transition");
  carousel.scrollLeft = carousel.offsetWidth;
  carousel.classList.remove("no-transition");

  // Add event listeners for the arrow buttons to scroll the carousel left and right
  if(left || right) {

    left.addEventListener("click", () => {
      carousel.scrollLeft += -firstCardWidth;
    });
    right.addEventListener("click", () => {
      carousel.scrollLeft += firstCardWidth;
    });
  }

  const infiniteScroll = () => {
    // If the carousel is at the beginning, scroll to the end
    if (carousel.scrollLeft === 0) {
      carousel.classList.add("no-transition");
      carousel.scrollLeft = carousel.scrollWidth - 2 * carousel.offsetWidth;
      carousel.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if (
      Math.ceil(carousel.scrollLeft) ===
      carousel.scrollWidth - carousel.offsetWidth
    ) {
      carousel.classList.add("no-transition");
      carousel.scrollLeft = carousel.offsetWidth;
      carousel.classList.remove("no-transition");
    }
  };

  carousel.addEventListener("scroll", infiniteScroll);
}
if (document.querySelector(".PS1") || document.querySelector(".PS2")) {
  Carousel(document.querySelector(".PS1"));
  Carousel(document.querySelector(".PS2"));
  Carousel(document.querySelector(".PS3"));
}

if (document.querySelector(".toggle_filters")) {
  let track = true;
  const btn = document.querySelector(".toggle_filters");
  const par = btn.parentElement;
  btn.addEventListener("click", function () {
    console.log(1232);
    if (track) {
      par.style.left = "-300px";
      track = false;
    } else {
      par.style.left = "0";
      track = true;
    }
  });

  window.addEventListener('resize', function () {
    if(window.innerWidth >600) {
      par.style.left = "0";
      track = true
    }
  });

}
