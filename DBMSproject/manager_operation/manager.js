$(".btnedit").click((e) => {
  let textvalues = displayData(e);
  console.log(textvalues);
  let Employee_ID = $("input[name*='Employee_ID']");
  let Employee_name = $("input[name*='Employee_name']");
  let username = $("input[name*='username']");
  let E_password = $("input[name*='E_password']");

  Employee_ID.val(textvalues[0]);
  Employee_name.val(textvalues[1]);
  username.val(textvalues[2]);
  E_password.val(textvalues[3]);
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
