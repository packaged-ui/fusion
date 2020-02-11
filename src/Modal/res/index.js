import './modal.css';
import {on} from "../../Foundation/res";
import Modal from "@packaged-ui/modal";

on(document, 'click', '[modal-launcher]', function (e) {
  e.preventDefault();
  var modalEle = document.getElementById(e.delegateTarget.getAttribute('modal-launcher'));
  if(!modalEle)
  {
    console.error("No modal could be found with the id " + e.delegateTarget.getAttribute('modal-launcher'))
    return
  }
  modalEle.classList.add('modal--show');
  var mod = new Modal();
  mod.appendChild(modalEle);
  mod.show();
});

on(document, 'click', '[modal-closer]', function (e) {
  e.preventDefault();
});
