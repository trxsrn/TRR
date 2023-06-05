const quali = document.getElementById('qualification');
const textbox = document.getElementById('specific_qualification');

quali.addEventListener('change', function() {
  if (quali.value === 'Others') {
    textbox.removeAttribute('disabled');
  } else {
    textbox.setAttribute('disabled', true);
  }
});

const affi_select = document.getElementById('affiliation');
const affi_textbox = document.getElementById('specific_affiliation');

affi_select.addEventListener('change', function() {
  if (affi_select.value === 'None') {
    affi_textbox.setAttribute('disabled', true);
  } else {
    affi_textbox.removeAttribute('disabled');
  }
});