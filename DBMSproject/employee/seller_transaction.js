$(".btnedit").click((e) => {
  let textvalues = displayData(e);
  console.log(textvalues);
  let seller_id = $("input[name*='seller_id']");
  let transaction_id = $("input[name*='transaction_id']");
  let purchased_date = $("input[name*='purchased_date']");
  let grade_A_quantity = $("input[name*='grade_A_quantity']");
  let grade_B_quantity = $("input[name*='grade_B_quantity']");
  let grade_C_quantity = $("input[name*='grade_C_quantity']");
  let buyprice_A = $("input[name*='buyprice_A']");
  let buyprice_B = $("input[name*='buyprice_B']");
  let buyprice_C = $("input[name*='buyprice_C']");

  transaction_id.val(textvalues[0]);
  seller_id.val(textvalues[1]);
  purchased_date.val(textvalues[3]);
  grade_A_quantity.val(textvalues[4]);
  grade_B_quantity.val(textvalues[5]);
  grade_C_quantity.val(textvalues[6]);
  buyprice_A.val(textvalues[7]);
  buyprice_B.val(textvalues[8]);
  buyprice_C.val(textvalues[9]);
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
