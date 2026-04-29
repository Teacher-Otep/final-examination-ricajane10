function showSection(sectionId) {
    const sections = ['home','create','information','update','delete'];
    sections.forEach(id => {
        document.getElementById(id).style.display = (id === sectionId) ? 'block' : 'none';
    });
}

function clearFields() {
    document.querySelectorAll("input[type='text'], input[type='number']").forEach(input => {
        input.value = "";
    });
}

document.addEventListener("DOMContentLoaded", () => {
    const logo = document.getElementById("logo");
    if (logo) {
        logo.addEventListener("click", () => {
            showSection('home');
        });
    }
});
