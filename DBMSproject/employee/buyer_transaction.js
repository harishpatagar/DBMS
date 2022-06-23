$(".btnedit").click((e) => {
  let textvalues = displayData(e);
  console.log(textvalues);
  let buyer_id = $("input[name*='buyer_id']");
  let transaction_id = $("input[name*='transaction_id']");
  let sell_date = $("input[name*='sell_date']");
  let grade_A_quantity = $("input[name*='grade_A_quantity']");
  let grade_B_quantity = $("input[name*='grade_B_quantity']");
  let grade_C_quantity = $("input[name*='grade_C_quantity']");
  let sellprice_A = $("input[name*='sellprice_A']");
  let sellprice_B = $("input[name*='sellprice_B']");
  let sellprice_C = $("input[name*='sellprice_C']");

  transaction_id.val(textvalues[0]);
  buyer_id.val(textvalues[1]);
  sell_date.val(textvalues[3]);
  grade_A_quantity.val(textvalues[4]);
  grade_B_quantity.val(textvalues[5]);
  grade_C_quantity.val(textvalues[6]);
  sellprice_A.val(textvalues[7]);
  sellprice_B.val(textvalues[8]);
  sellprice_C.val(textvalues[9]);
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
