window.addEventListener('scroll', function () {
	const statbut = document.getElementById('statbut')
	if (window.scrollY > 100) {
		statbut.classList.add('hidden')
	} else {
		statbut.classList.remove('hidden')
	}
})

window.addEventListener('scroll', function () {
	const scrollup = document.getElementById('scrollup')
	if (window.scrollY > 200) {
		scrollup.classList.remove('hidden')
	} else {
		scrollup.classList.add('hidden')
	}
})

// Получаем элементы
const modal = document.getElementById('myModal')
const btn = document.getElementById('zayav') // Кнопка открытия модального окна
const span = document.getElementsByClassName('close')[0]

// Открытие модального окна
btn.onclick = function () {
	modal.style.display = 'block'
	setTimeout(() => {
		modal.style.opacity = 1 // Плавное открытие
		modal.querySelector('.modal-content').style.transform = 'scale(1)' // Плавное масштабирование
	}, 10) // Небольшая задержка для запуска перехода
}

// Закрытие модального окна
span.onclick = function () {
	modal.style.opacity = 0 // Плавное закрытие
	modal.querySelector('.modal-content').style.transform = 'scale(0.7)' // Плавное уменьшение
	setTimeout(() => {
		modal.style.display = 'none' // Скрываем окно после завершения перехода
	}, 500) // Время должно совпадать с временем перехода
}

// Закрытие модального окна при клике вне его
window.onclick = function (event) {
	if (event.target == modal) {
		span.onclick() // Используем функцию закрытия
	}
}

document.getElementById('myForm').addEventListener('submit', function (event) {
	event.preventDefault() // Предотвратить стандартную отправку формы

	const formData = new FormData(this)

	fetch('../js/submit.php', {
		method: 'POST',
		body: formData,
	})
		.then(response => response.text())
		.then(result => {
			console.log(result) // Обработка ответа от сервера
			// Закрытие модального окна и очистка формы
			document.getElementById('myModal').style.display = 'none'
			document.getElementById('myForm').reset()
		})
		.catch(error => console.error('Error:', error))
})

document.getElementById('phone').addEventListener('input', function (e) {
	const input = e.target
	let value = input.value.replace(/\D/g, '') // Удаляем все нецифровые символы

	if (value.startsWith('7')) {
		value = value.substring(1) // Удаляем лишнюю первую 7, если она есть
	}

	let formattedNumber = '+7 '

	if (value.length > 0) {
		formattedNumber += '(' + value.substring(0, 3)
	}
	if (value.length > 3) {
		formattedNumber += ') ' + value.substring(3, 6)
	}
	if (value.length > 6) {
		formattedNumber += '-' + value.substring(6, 8)
	}
	if (value.length > 8) {
		formattedNumber += '-' + value.substring(8, 10)
	}

	input.value = formattedNumber
})
