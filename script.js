// وظيفة البحث الذكي
function searchFunction() {
    let input = document.getElementById('myInput').value.toLowerCase();
    let cards = document.getElementsByClassName('card');
    
    for (let i = 0; i < cards.length; i++) {
        let title = cards[i].querySelector('h3').innerText.toLowerCase();
        if (title.includes(input)) {
            cards[i].style.display = "block";
        } else {
            cards[i].style.display = "none";
        }
    }
}

// حركة ظهور البطاقات تدريجياً عند تحميل الصفحة
document.addEventListener("DOMContentLoaded", function() {
    let cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('show');
        }, index * 100); 
    });
});