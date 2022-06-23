$(".btnedit").click((e) => {
  let textvalues = displayData(e);
  console.log(textvalues);
  let BranchId = $("input[name*='BranchId']");
  let Branch_name = $("input[name*='Branch_name']");
  let address = $("input[name*='address']");
  let Manager_name = $("input[name*='Manager_name']");
  let username = $("input[name*='username']");
  let password = $("input[name*='password']");

  BranchId.val(textvalues[0]);
  Branch_name.val(textvalues[1]);
  address.val(textvalues[2]);
  Manager_name.val(textvalues[3]);
  username.val(textvalues[4]);
  password.val(textvalues[5]);
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
