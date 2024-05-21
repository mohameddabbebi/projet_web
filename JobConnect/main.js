
function toggleMenu() {
  var navbar = document.getElementById("navbar");
  if (navbar.style.display === "none" || navbar.style.display === "") {
    navbar.style.display = "block";
  } else {
    navbar.style.display = "none";
  }
}

var modal = document.getElementById("myModal");

// Function to show the modal if not already shown
function showModalOnce() {
  if (localStorage.getItem("modalShown") !== "true") {
    modal.style.display = "block";
    localStorage.setItem("modalShown", "true");
  }
}

window.onload = function() {
  setTimeout(showModalOnce, 10000); // Show modal after 10 seconds
  document.getElementById('connec').onclick = function() {
      window.location.href = "user_connect.html";
  };
  document.getElementById('insc').addEventListener('click', inscrire); //ki tckicki 3la insc tkteb click fl console
  document.getElementById('pers').onclick = function() {
      
      closeChoiceModal();
      window.location.href = "inscrire.html"; // kticliqui bin pers w entr fenetre titssaker
  };
  document.getElementById('ent').onclick = function() { //teckliqui al haja tikhdim function ili fiha
    closeChoiceModal();
      window.location.href = "inscrire_comp.html";
  };
};


function inscrire() {
  var Choice = document.getElementById("myChoice");
  if (Choice.style.display === 'none' || Choice.style.display === '') {
    Choice.style.display = 'block';
  } else {
    Choice.style.display = 'none';
  }
}

function closeChoiceModal() {
  var Choice = document.getElementById("myChoice");
  Choice.style.display = 'none';
}
