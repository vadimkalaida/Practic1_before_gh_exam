var openMenuClick = 0;

function openMenuClickFunc() {
  if(openMenuClick == 0) {
    document.querySelector('#nav-toggle-btn-open').className = 'fa fa-times';
    openMenuClick = 1;
  } else if(openMenuClick == 1) {
    document.querySelector('#nav-toggle-btn-open').className = 'fa fa-bars';
    openMenuClick = 0;
  }
}

function openMenu() {
  document.querySelector('#nav').classList.toggle('active');
  document.querySelector('#menu-text').classList.toggle('active');
}