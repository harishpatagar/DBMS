//let id = $("input[name*='seller_id']");
//id.attr("readonly", "readonly");

$(".btnedit").click((e) => {
  let textvalues = displayData(e);
  console.log(textvalues);
  let seller_id = $("input[name*='seller_id']");
  let seller_name = $("input[name*='seller_name']");
  let phone = $("input[name*='phone']");
  let s_address = $("input[name*='s_address']");
  let AC_no = $("input[name*='AC_no']");
  let IFSC = $("input[name*='IFSC']");
  let username = $("input[name*='username']");
  let c_password = $("input[name*='c_password']");

  seller_id.val(textvalues[0]);
  seller_name.val(textvalues[1]);
  phone.val(textvalues[2]);
  s_address.val(textvalues[3]);
  AC_no.val(textvalues[4]);
  IFSC.val(textvalues[5]);
  username.val(textvalues[6]);
  c_password.val(textvalues[7]);
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
