var info = [];
var comfirmBtn = document.querySelector('.modal-body form input[type="submit"]');
comfirmBtn.addEventListener('click', addInfoToTable);

function getInfo() {
  info.push(document.querySelector('.modal-body #tea-type').value);
  info.push(document.querySelector('.modal-body #tea-mass').value);
  info.push(document.querySelector('.modal-body #tea-mass-rate').value);
  info.push(document.querySelector('.modal-body #tea-price').value);
  info.push(document.querySelector('.modal-body #tea-message').value);
}

function addInfoToTable() {
  getInfo();

  var textTr = `
      <tr>
        <td>${info[0]}</td>
        <td>${info[1]}</td>
        <td>${info[2]}</td>
        <td>${info[3]}</td>
        <td>${info[4]}</td>
        <td>${info[2]}</td>
        <td>${info[2]}</td>
      </tr>
  `;
  $('.order .create-order-body table tbody').append(textTr);
}
// add tea info into table