//let id = $("input[name*='m_date']");
//id.attr("readonly", "readonly");

$(".btnedit").click((e) => {
  // let textvalues = displayData(e);
  alert("clicked");
  // let m_date = $("input[name*='m_date']");
  // let Grade_A_price = $("input[name*='Grade_A_price']");
  // let Grade_B_price = $("input[name*='Grade_B_price']");
  // let Grade_C_price = $("input[name*='Grade_C_price']");

  // m_date.val(textvalues[0]);
  // Grade_A_price.val(textvalues[1]);
  // Grade_B_price.val(textvalues[2]);
  // Grade_C_price.val(textvalues[3].replace("$", ""));
});

function displayData(e) {
  let id = 0;
  const td = $("#tbody tr td");
  let textvalues = [];

  for (const value of td) {
    if (value.dataset.m_date == e.target.dataset.m_date) {
      textvalues[m_date++] = value.textContent;
    }
  }
  return textvalues;
}
