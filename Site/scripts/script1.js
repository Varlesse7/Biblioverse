$(function() {
var $carousel = $('.carousel');
var $bookContainers = $carousel.find('.book-container');
var $activeBook = $bookContainers.filter('.active');
var $prevBook = $bookContainers.filter('.prev');
var $nextBook = $bookContainers.filter('.next');
var currentIndex = $bookContainers.index($activeBook);
var numBooks = $bookContainers.length;

function updateClasses() {
$bookContainers.removeClass('prev active next');
$activeBook = $bookContainers.eq(currentIndex);
$prevBook = $bookContainers.eq((currentIndex - 1 + numBooks) % numBooks);
$nextBook = $bookContainers.eq((currentIndex + 1) % numBooks);
$prevBook.addClass('prev');
$activeBook.addClass('active');
$nextBook.addClass('next');
}

$('.next-btn').on('click', function() {
currentIndex = (currentIndex + 1) % numBooks;
updateClasses();
});

$('.prev-btn').on('click', function() {
currentIndex = (currentIndex - 1 + numBooks) % numBooks;
updateClasses();
});
});