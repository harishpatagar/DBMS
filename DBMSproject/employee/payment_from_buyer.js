//let id = $("input[name*='buyer_id']");
//id.attr("readonly", "readonly");

$(".btnedit").click((e) => {
    let textvalues = displayData(e);
    console.log(textvalues);
    let buyer_id = $("input[name*='buyer_id']");
    let payment_method = $("input[name*='payment_method']");
    let payment_date = $("input[name*='payment_date']");
    let amount = $("input[name*='amount']");
    let recipt_no = $("input[name*='recipt_no']");
  
    buyer_id.val(textvalues[0]);
    payment_method.val(textvalues[1]);
    payment_date.val(textvalues[2]);
    amount.val(textvalues[3]);
    recipt_no.val(textvalues[4]);
  });
  
  function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];
  
    for (const value of td) {
      if (value.dataset.id == e.target.dataset.id) {
        textvalues[id++] = value.textContent;
        console.log(e.target.dataset.id);
        console.log(value);
      }
    }
    return textvalues;
  }
  