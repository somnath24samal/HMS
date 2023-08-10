window.addEventListener('hashchange', function() {
    var hash = window.location.hash.substr(1);
    var activeSection = document.getElementById(hash);
  
    if (activeSection) {
      var sections = document.querySelectorAll('.container > div');
      sections.forEach(function(section) {
        section.style.display = 'none';
      });
  
      activeSection.style.display = 'block';
    }
  });
  