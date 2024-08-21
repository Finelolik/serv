document.addEventListener('DOMContentLoaded', function () {
	fetch('../js/get_req.php')
		.then(response => response.json())
		.then(data => {
			const container = document.getElementById('requests-container')
			data.forEach(item => {
				const div = document.createElement('div')
				div.className = 'request'

				const nameBlock = document.createElement('div')
				nameBlock.className = 'reqblock'
				nameBlock.textContent = item.name

				const numberBlock = document.createElement('div')
				numberBlock.className = 'reqblock'
				numberBlock.textContent = item.number

				const textBlock = document.createElement('div')
				textBlock.className = 'reqtext'
				textBlock.textContent = item.request

				div.appendChild(nameBlock)
				div.appendChild(numberBlock)
				div.appendChild(textBlock)

				container.appendChild(div)
			})
		})
		.catch(error => console.error('Ошибка:', error))
})
