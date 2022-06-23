$(".btnedit").click((e) => {
  let textvalues = displayData(e);
  console.log(textvalues);
  let buyer_id = $("input[name*='buyer_id']");
  let buyer_name = $("input[name*='buyer_name']");
  let phone = $("input[name*='phone']");
  let B_Address = $("input[name*='B_Address']");

  buyer_id.val(textvalues[0]);
  buyer_name.val(textvalues[1]);
  phone.val(textvalues[2]);
  B_Address.val(textvalues[3]);
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
