const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const menuBtn = document.getElementById('menuBtn');

function setSidebarState(isOpen) {
    sidebar.classList.toggle('open', isOpen);
    overlay.classList.toggle('show', isOpen);
    overlay.setAttribute('aria-hidden', String(!isOpen));
    menuBtn.setAttribute('aria-expanded', String(isOpen));
    menuBtn.setAttribute('aria-label', isOpen ? 'Close navigation' : 'Open navigation');
}

function openSidebar() {
    setSidebarState(true);
}

function closeSidebar() {
    setSidebarState(false);
}

menuBtn.addEventListener('click', () => {
    setSidebarState(!sidebar.classList.contains('open'));
});

overlay.addEventListener('click', closeSidebar);

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && sidebar.classList.contains('open')) {
        closeSidebar();
        menuBtn.focus();
    }
});

// const sidebar = document.querySelector('.sidebar');
// const toggle = document.querySelector('.toggle');

// toggle.addEventListener('click', () => {
//     sidebar.classList.toggle('close');
// });

// const body = document.querySelector('body');
// const sidebar = body.querySelector('.sidebar');
// const toggle = body.querySelector('.toggle');
// const searchBtn = body.querySelector('.search-box');
// const modeSwitch = body.querySelector(".toggle-switch");
// const modeText = body.querySelector('.mode-text');

// toggle.addEventListener('click', () => {

//     sidebar.classList.toggle('close');

// });
const body = document.querySelector('body');
//const sidebar = body.querySelector('.sidebar');
const toggle = body.querySelector('.toggle');
const searchBtn = body.querySelector('.search-box');
const modeSwitch = body.querySelector(".toggle-switch");
const modeText = body.querySelector('.mode-text');


function showSection(sectionName) {
    // Hide all sections
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active-section');
    });
    
    // Show selected section
    const activeSection = document.getElementById(`${sectionName}-section`);
    if (activeSection) {
        activeSection.classList.add('active-section');
    }
}

// Initialize - show dashboard by default
document.addEventListener('DOMContentLoaded', function() {
    showSection('dashboard');
});


function deleteListing(link) {
    event.preventDefault();  

    const confirmed = confirm('Are you sure you want to delete this listing?');
    if (!confirmed) return;

    
    const row = link.closest('tr');
    row.remove();
}

function filterUsers() {
    const searchTerm = document.getElementById('userSearch').value.toLowerCase();

    const rows = document.querySelectorAll('#Users-section tbody tr');

    rows.forEach(row => {
        const searchableText = row.textContent.toLowerCase();

        if (searchableText.includes(searchTerm)) {
            row.style.display = ''; 
        } else {
            row.style.display = 'none';
        }
    });
}