const renderContent = () => {
    const contentElemsArr = [...document.querySelectorAll(".band__description")];
    const textArr = contentElemsArr.map(item => item.innerText);
    const shortTextArr = textArr.map(elem =>
        elem.length > 303
            ? elem.substr(0, 300) + "..."
            : elem);

    contentElemsArr.forEach((elem, index) => {
        contentElemsArr[index].innerText = shortTextArr[index];
    })
}


document.addEventListener("DOMContentLoaded", renderContent);
