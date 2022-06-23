$(".btnedit").click((e) => {
  let textvalues = displayData(e);
  console.log(textvalues);
  let m_date = $("input[name*='m_date']");
  let Grade_A_price = $("input[name*='Grade_A_price']");
  let Grade_B_price = $("input[name*='Grade_B_price']");
  let Grade_C_price = $("input[name*='Grade_C_price']");

  m_date.val(textvalues[0]);
  Grade_A_price.val(textvalues[1]);
  Grade_B_price.val(textvalues[2]);
  Grade_C_price.val(textvalues[3]);
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
