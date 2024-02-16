// clé publique Stripe
const stripe = Stripe("pk_test_51OXjuBLF8qtlknccs1CesPywkLGiaWtvDfvOfpRnXs3gf5BndGRKD0mSAd07feDJZv3VadsKr5dGWr2b1cQ9Ia8F00Vmq1GStW");

let baseUrl = window.location.origin + '/stripePhp_tuto/creation_pannier_paiement/';


$(document).ready(function () {


  // where the item of sell will be display
  let parent = $("#cartModal").find("ul");

  var cartModal = new bootstrap.Modal(document.getElementById("cartModal"));
  $("#CartIcon").on("click", function (e) {
    cartModal.toggle();
  });
  $("#showCart").on("click", function (e) {
    cartModal.toggle();
  });

  /**
   * change the quantity of product
   */
  let quantityIcons = $("p.icon");
  $(quantityIcons).on("click", function (e) {

    // select elements in html
    let parent = $(e.target.parentElement.parentElement); // where the product informations is displayed
    let productCard = $(
      e.target.parentElement.parentElement.parentElement.parentElement
    );

    // select operator
    let iconValue = $(e.target)[0].innerText;

    // select quantity of product
    let quantityInput = $(e.target.parentElement.parentElement).find("input");
    let quantity = parseInt(
      $(e.target.parentElement.parentElement).find("input").val()
    );

    changeQuantity(iconValue, quantityInput, quantity);

  });

  /**
   * add to cart
   */
  let addButton = $("#Products").find("button");
  addButton.on("click", function (e) {

    let productCard = $(e.target.parentElement.parentElement.parentElement);

    let nameOfProduct = $(e.target.parentElement.parentElement.parentElement)
      .find("h5")
      .text();

    let pictureOfProduct = $(
      e.target.parentElement.parentElement.parentElement
    ).find("img")[0].src;

    let quantity = parseFloat($(e.target.parentElement).find("input").val());
    let price = $(e.target.parentElement.parentElement).find("li.price").text();
    price = parseFloat(price.replace(/[^0-9.]/g, ""));
    let total = quantity * price;

    if (quantity > 0) {
      // item of sell
      let element = createdProductCart(
        nameOfProduct,
        pictureOfProduct,
        total,
        quantity,
        price
      );

      productCard.removeClass("border-dark").addClass("border-info"); // added to cart

      let collection = $(parent.children()); // products in the cart
      let productRemplaced = false; // to know if the product must be added in the cart

      // check in the cart if the product already exist
      collection.each(function (index, element) {
        let productAlreadyExist = $(element).find("h5");

        // if exist, replace the price and quantity in the cart
        if (nameOfProduct == productAlreadyExist.text()) {
          let oldQuantity = parseFloat($(element).find("span").text());
          let newQuantity = oldQuantity + parseFloat(quantity);
          let newTotal = newQuantity * parseFloat(price);
          $(element).find("span").text(newQuantity);
          $(element)
            .find("p.price")
            .text(newTotal.toFixed(2) + " €");

          productRemplaced = true;
        }
      });

      // if the product not exist in the cart
      if (!productRemplaced) {
        parent.append(element);
        let jqElement = parent.children(":last");

        /**
         * if the quantity of product has modified
         */
        $(jqElement)
          .find("p.icon")
          .on("click", function (e) {
            let total = $(e.target.parentElement.parentElement).find("p.price");

            let totalInt = $(e.target.parentElement.parentElement)
              .find("p.price")
              .text();
            totalInt = parseFloat(totalInt.replace(/[^0-9.]/g, ""));

            let operator = e.target.textContent;
            let quantityInput = $(e.target.parentElement.parentElement).find(
              "span"
            );
            let quantity = parseFloat(
              $(e.target.parentElement.parentElement).find("span").text()
            );

            
            totalPriceOfProduct(operator, totalInt, price, total);
            
            changeQuantity(operator, quantityInput, quantity);

            // modify the invisible input for the form submit :
            let quantityInputToSubmit = $(jqElement).find('input.quantity');
            if (operator == '+') {
              quantityInputToSubmit.val(quantity+1);
            } else {
              quantityInputToSubmit.val(quantity-1);
            }

            // if the quantity of product is 0, => remove the element :
            if (quantity === 1) {
              if (operator == "-") {
                jqElement.remove();
                productCard.removeClass("border-info").addClass("border-dark");
              }
            }
          });
      }
    }

      // information of product added in the cart
      cartModal.show();
    }
  );

  // /**
  //  * Submit of payment
  //  */
  // let payButton = $("#checkout-button");
  // payButton.on("click", function (e) {

  //   // the array of products to submit
  //   let productList = [];

  //   // all products in the cart
  //   parent.children().each(function (index, element) {
  //     let totalPrice = $(element).find("p.price").text();
  //     totalPrice = parseFloat(totalPrice.replace(/[^0-9.]/g, ""));
  //     let quantity = parseFloat($(element).find("span").text());
  //     let priceOfProduct = totalPrice / quantity;

  //     let product = {
  //       nameOfProduct: $(element).find("h5").text(),
  //       totalPrice: totalPrice,
  //       quantity: quantity,
  //       priceOfProduct: priceOfProduct,
  //       picture: $(element).find("img")[0].src,
  //     };

  //     productList.push(product);

  //   });

  //   console.log(productList);

  //   // Proced to payment 


  // });
});

// ##################################################################################################

/**
 * Adjust the quantity of product in the page or in the modal
 * @param {string} iconValue the value of operator (+ or -)
 * @param {object} quantityInput the jq object where the quantity will be changed
 * @param {int} quantity the number of quantity product
 */
function changeQuantity(iconValue, quantityInput, quantity) {
  if (quantityInput.is("input")) {
    if (iconValue == "+") {
      quantity += 1;
      quantityInput.val(quantity);
    } else {
      if (quantity !== 1) {
        quantity -= 1;
        quantityInput.val(quantity);
      }
    }
  } else {
    if (iconValue == "+") {
      quantity += 1;
      quantityInput.text(quantity);
    } else {
      quantity -= 1;
      quantityInput.text(quantity);
    }
  }
}

/**
 * Instant calculate the total price of product in the cart when the quantity is adjusted
 * @param {string} operator the value of operator (+ or -)
 * @param {int} total the total price of product
 * @param {int} priceProduct the price of product
 * @param {object} totalInput the jq object where the quantity will be changed
 */
function totalPriceOfProduct(operator, total, priceProduct, totalInput) {
  if (operator == "+") {
    total += priceProduct;
    totalInput.text(total.toFixed(2) + " €");
  } else {
    total -= priceProduct;
    totalInput.text(total.toFixed(2) + " €");
  }
}

/**
 * Create the row of product will be insert in the cart
 * @param {string} nameOfProduct the tittle of product
 * @param {string} pictureOfProduct the src of picture
 * @param {int} total the total price of product
 * @param {int} quantity the quantity of product
 * @param {int} price the unique price of product
 */
function createdProductCart(
  nameOfProduct,
  pictureOfProduct,
  total,
  quantity,
  price
) {
  return `
    <li class="list-group-item row justify-content-between g-0">
        <div class="col-md-4">
            <h5>${nameOfProduct}</h5>
            <input type="text" name="${nameOfProduct+'_nameProduct'}" value="${nameOfProduct}" style="display: none;">
            <input class="quantity" type="text" name="${nameOfProduct+'_quantityProduct'}" value="${quantity}" style="display: none;">
            <img src="${pictureOfProduct}" class="card-img-top" alt="">
        </div>
        <div class="col-md-8 d-flex justify-content-around align-items-center">
            <p class="price">${total.toFixed(2)} €</p>
            <div class="quantity d-flex justify-content-center align-items-center">
                <p class="icon">-</p>
                <p class="icon">+</p>
            </div>
            <p>(<span>${quantity}</span>)</p>
        </div>
        <input type="text" name="${nameOfProduct+'_uniquePrice'}" value="${price}" style="display: none;">
    </li>
`;
}

