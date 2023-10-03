// toggle navbar visibility on scroll
ToggleNav: (function () {
  let Previous_Value = 0;
  const NAV_ELEMENT = document.querySelector("#ADMIN_NAVIGATION");
  const SCROLL_ELEMENT = document.querySelector("#ADMIN_MIN");
  SCROLL_ELEMENT.addEventListener("scroll", ToggleNavOnScroll);

  let Cursor_On_Nav = true;
  NAV_ELEMENT.onmouseover = () => {
    Cursor_On_Nav = false;
  };
  NAV_ELEMENT.onmouseleave = () => {
    Cursor_On_Nav = true;
  };
  function ToggleNavOnScroll() {
    if (Cursor_On_Nav) {
      if (this.scrollTop > Previous_Value) {
        NAV_ELEMENT.style.position = "sticky";
        Previous_Value = this.scrollTop;
      } else {
        NAV_ELEMENT.style.position = "relative";
        Previous_Value = this.scrollTop;
      }
    }
  }
})();

// toggle navbar visibility on scroll
ToggleLable: function ToggleLable() {
  let INPUTS_ELEMENT = [];
  INPUTS_ELEMENT = [
    ...INPUTS_ELEMENT,
    ...document.querySelectorAll(".input input"),
  ];
  INPUTS_ELEMENT = [
    ...INPUTS_ELEMENT,
    ...document.querySelectorAll(".input textarea"),
  ];

  INPUTS_ELEMENT.forEach((elm) => {
    elm.addEventListener("focus", AddStyleOnInput);
    elm.addEventListener("blur", RemoveStyleFromInput);
  });

  function AddStyleOnInput(e) {
    this.previousElementSibling.style.transform = "translateY(-20px)";
    this.parentElement.style.borderColor = "#4C68FF";
  }
  function RemoveStyleFromInput(e) {
    if (!this.value) {
      this.previousElementSibling.style.transform = "translateY(0)";
      this.parentElement.style.borderColor = "#e7e7e7";
    }
  }
}
ToggleLable();

// toggle navbar visibility on scroll
AddSS: (function (i) {
  function Template(i) {
    return `
    <div class='input_wrp'>
        <div class='input'>
            <label for='product_size_${i}'>Product Size</label>
            <input type='text' name='product_size[]' id='product_size_${i}'>
        </div>
        <div class='input'>
            <label for='product_stock_${i}'>Product Stock</label>
            <input type='text' name='product_stock[]' id='product_stock_${i}'>
        </div>
    </div>
  `;
  }

  if (document.querySelector(".add_ss")) {
    let Button_Element = document.querySelector(".add_ss");
    Button_Element.addEventListener("click", Apply);
  }

  function Apply(e) {
    const div = document.createElement("div");
    div.className = "input_wrp";
    div.innerHTML = Template(this.parentElement.children.length);
    this.parentElement.append(div);
    ToggleLable();
  }
})();

function DDImage() {
  let INPUT = document.querySelector("#file_input");
  const item = document.querySelector("#addImage__lable");
  const t_Controles = document.querySelector("#Controles");
  const gal = document.querySelector(".gallery");

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
  let slider_wrp = document.querySelector("#Carousel");
  function fileManager(files) {
    slider_wrp.innerHTML = "";
    function display(imgurl) {
      let article = document.createElement("article");
      article.id = "Card";
      article.setAttribute(
        "class",
        "overflow-hidden d-flex flex-column align-items-center position-relative rounded-2"
      );
      article.innerHTML = `
        <div id="Img" class="position-relative">
          <img src="${imgurl}" />
        </div>
      `;
      slider_wrp.appendChild(article);
    }

    for (let i = 0; i < files.length; i++) {
      const reader = new FileReader();
      reader.readAsDataURL(files[i]);
      reader.onload = function () {
        display(reader.result, files.length);
        if (i == files.length - 1) {
          gal.style.display = "flex";
          t_Controles.style.display = "flex";
          Carousel(document.querySelector(".gallery"));
        }
      };
    }
  }
}
if (document.querySelector("#file_input")) {
  DDImage();
}

Swiper: function Carousel(CONTAINER) {
  const carousel = CONTAINER.querySelector("#Carousel");
  const left = document.querySelector("#Left1");
  const right = document.querySelector("#Right1");
  const count_span = document.querySelector("#Controles .count");
  const carouselChildrens = [...carousel.children];
  const firstCardWidth = carouselChildrens[0].offsetWidth;
  let track = 0;

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
  if (track == 0 || carouselChildrens.length > 1) {
    track = 1;
    count_span.innerHTML = track;
  }
  left.addEventListener("click", () => {
    carousel.scrollLeft += -firstCardWidth;
    if (track == 1) {
      track = carouselChildrens.length + 1;
    }
    track--;
    count_span.innerHTML = track;
  });
  right.addEventListener("click", () => {
    carousel.scrollLeft += firstCardWidth;
    if (track == carouselChildrens.length) {
      track = 1;
    } else {
      track++;
    }
    count_span.innerHTML = track;
  });

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

Send_Delete_Request: function Delete_Product(Button) {
  if (confirm("Click 'OK' to Delete Product!")) {
    const product_card = Button.parentElement.parentElement;
    const product_id = product_card.getAttribute("product-id");
    let url = `./modules/delete_product.php?product=${product_id.trim()}`;

    fetch(url)
      .then((res) => res.text())
      .then((data) => {
        if (data == "200") {
          product_card.style.display = "none";
        }
      });
  }
}
