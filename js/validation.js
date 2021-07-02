

function validateCard()
{
  const form = document.getElementById("submissionForm");
  const paymentSelector = document.getElementById("paymentSelector");
  const cardNumberInput = document.getElementById("cardNumberInput");
  const monthSelector = document.getElementById("monthSelector");
  const yearSelector = document.getElementById("yearSelector");
  const securityCodeInput = document.getElementById("securityCodeInput");
  const confirmationLabel = document.getElementById("confirmation");
  const jsValidCheck = document.getElementById("jsValidCheck");

  var cardNumberCheck = /^(?:5[1-5][0-9]{14})$/;
  var expiryDate = new Date(yearSelector.value,monthSelector.value);
  var currentDate = new Date();

  if(cardNumberInput.value.match(cardNumberCheck))
  {
    if(expiryDate>currentDate)
    {
      if(securityCodeInput.value.length<=4 && securityCodeInput.value.length>=3)
      {
        jsValidCheck.value="true";
      }
      else
      {
        alert("Security code is an incorrect length")
        jsValidCheck.value="false";
        form.action="index.php";
      }
    }
    else
    {
      alert("Card has expired");
      jsValidCheck.value="false";
      form.action="index.php";
    }
  }
  else
  {
    alert("Invalid card");
    jsValidCheck.value="false";
    form.action="index.php";
  }
}