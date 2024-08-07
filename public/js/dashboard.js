// start: DROPDOWN MENU
var arrow_list = document.getElementById('arrow_list');
var list_submenu = document.getElementById('list_submenu');
var list_group = document.getElementById('list_group');
var submenu_group = document.getElementById('submenu_group');
var option_profile = document.getElementById('more_option');


function dropdownMenu() {
    arrow_list.classList.toggle('rotate-0');
    list_submenu.classList.toggle('hidden');
}
dropdownMenu()

function dropdownGroup() {
    list_group.classList.toggle('rotate-0');
    submenu_group.classList.toggle('hidden');
}
dropdownGroup()

function optionProfile() {
    option_profile.classList.toggle('hidden');
}
optionProfile()
// end: DROPDOWN MENU

document.querySelectorAll('.tab-link').forEach(button => {
    button.addEventListener('click', () => {
        document.querySelectorAll('.tab-link').forEach(btn => btn.classList.remove('bg-[#0076CB]', 'text-white'));
        button.classList.add('bg-[#0076CB]', 'text-white');

        document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
        document.getElementById(button.getAttribute('data-tab')).classList.add('active');
    });
});


// const tabs = document.querySelectorAll('nav a');
// const sections = document.querySelectorAll('div[id^="informasi-ppdb"], div[id^="tata-cara-ppdb"], div[id^="pendaftaran"]');

// tabs.forEach(tab => {
//     tab.addEventListener('click', event => {
//         event.preventDefault();

//         tabs.forEach(t => t.classList.remove('text-blue-600', 'border-blue-600'));
//         tab.classList.add('text-blue-600', 'border-blue-600');

//         sections.forEach(section => section.classList.add('hidden'));
//         document.querySelector(tab.getAttribute('href')).classList.remove('hidden');
//     });
// });


document.addEventListener('DOMContentLoaded', function () {
    const privateRadio = document.getElementById('private');
    const anyoneRadio = document.getElementById('anyone');
    const privateCodeInput = document.getElementById('privateCodeInput');

    function togglePrivateCodeInput() {
        if (privateRadio.checked) {
            privateCodeInput.classList.remove('hidden');
        } else {
            privateCodeInput.classList.add('hidden');
        }
    }

    // Initial check to hide or show the input field based on default selection
    togglePrivateCodeInput();

    // Event listeners for radio buttons
    privateRadio.addEventListener('change', togglePrivateCodeInput);
    anyoneRadio.addEventListener('change', togglePrivateCodeInput);
});