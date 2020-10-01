console.log('Custom JS Working');

const bodyCheck = document.getElementsByTagName('body')[0];

if (bodyCheck.classList.contains("post-type-archive-event")) {
    console.log('contains post-type-archive-event')
}



const link = document.querySelector('.thisLink');
link.href = "https://my.chartered.college/"
console.log(link);