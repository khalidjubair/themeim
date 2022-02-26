<?php
/**
 * Blog Single Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package themeim
 */

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Elbert Alias</title>

		<style>
			* {
				box-sizing: border-box;
			}

			html {
				height: 100%;
			}

			body {
				font-family: 'Helveticae Neue', Helvetica, Arial, sans-serif;
				color: #333;
				display: flex;
				align-items: center;
				justify-content: center;
				flex-direction: column;
				height: 100%;
				margin: 0;
			}

			h1 {
				font-size: 1.2rem;
				font-weight: normal;
				margin: 0;
			}

			p {
				margin: 0
			}

			a {
				color: #333;
				margin: 0 .2rem;
			}

			.header {
				display: flex;
				justify-content: space-between;
				height: 2rem;
				padding: 1rem;
				margin-bottom: -2rem;
				width: 100%;
			}

			.header svg {
				height: 20px;
				width: 20px;
			}

			.ttt-game {
				display: flex;
				align-items: center;
				margin: auto;
				width: 26rem;
				max-width: 90%;
			}

			.ttt-player {
				text-align: center;
			}

			.ttt-player-icon {
				color: var(--color-primary);
				width: 2.4rem;
				height: 2.4rem;
			}

			.ttt-player-icon--hidden {
				display: none;
			}

			.ttt-score {
				font-size: 1.5rem;
				margin-top: .5rem;
			}

			.ttt-grid {
				border-radius: 4px;
				line-height: 0;
				margin: auto;
				width: 12rem;
				white-space: nowrap;
			}

			.ttt-cell {
				border: 1px solid #333;
				border-width: 1px 0 0 1px;
				display: inline-block;
				padding: .2rem;
				width: 4rem;
				height: 4rem;
			}

			.ttt-row:first-child .ttt-cell {
				border-top: none;
			}

			.ttt-cell:first-child {
				border-left: none;
			}

			.ttt-icon {
				display: none;
				height: 100%;
				width: 100%;
			}

			.ttt-cell .ttt-icon {
				display: block;
			}

			.ttt-blink .ttt-icon {
				animation: blink 250ms step-end 0s 3;
			}

			@keyframes blink {
				50% {
					opacity: 0;
				}
			}
		</style>
	</head>
	<body>
		<div class="header">
			<h1>Elbert Alias</h1>

			<p>
				<a title="Email" href="mailto:honeypot@alias.io"><svg viewBox="0 0 24 24">
						<path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
					</svg></a>

				<a title="GitHub" href="https://github.com/aliasio" target="_blank"><svg viewBox="0 0 24 24">
						<path fill="currentColor" d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.81 5.03,16.5 5.03,16.5C4.12,15.88 5.1,15.9 5.1,15.9C6.1,15.97 6.63,16.93 6.63,16.93C7.5,18.45 8.97,18 9.54,17.76C9.63,17.11 9.89,16.67 10.17,16.42C7.95,16.17 5.62,15.31 5.62,11.5C5.62,10.39 6,9.5 6.65,8.79C6.55,8.54 6.2,7.5 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.5 17.45,8.54 17.35,8.79C18,9.5 18.38,10.39 18.38,11.5C18.38,15.32 16.04,16.16 13.81,16.41C14.17,16.72 14.5,17.33 14.5,18.26C14.5,19.6 14.5,20.68 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z" />
					</svg></a>

				<a title="LinkedIn" href="https://www.linkedin.com/in/elbertalias" target="_blank"><svg viewBox="0 0 24 24">
						<path fill="currentColor" d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M18.5 18.5V13.2A3.26 3.26 0 0 0 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17A1.4 1.4 0 0 1 15.71 13.57V18.5H18.5M6.88 8.56A1.68 1.68 0 0 0 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19A1.69 1.69 0 0 0 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56M8.27 18.5V10.13H5.5V18.5H8.27Z" />
					</svg></a>

				<a title="Instagram" href="https://www.instagram.com/elbertalias" target="_blank"><svg viewBox="0 0 24 24">
						<path fill="currentColor" d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
					</svg></a>
			</p>
		</div>

		<div class="ttt-game">
			<div class="ttt-player">
				<svg class="ttt-player-icon ttt-player-icon-x ttt-player-icon--ahead" viewBox="0 0 24 24">
					<path fill="currentColor" d="M19,10C19,11.38 16.88,12.5 15.5,12.5C14.12,12.5 12.75,11.38 12.75,10H11.25C11.25,11.38 9.88,12.5 8.5,12.5C7.12,12.5 5,11.38 5,10H4.25C4.09,10.64 4,11.31 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12C20,11.31 19.91,10.64 19.75,10H19M12,4C9.04,4 6.45,5.61 5.07,8H18.93C17.55,5.61 14.96,4 12,4M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" />
				</svg>

				<svg class="ttt-player-icon ttt-player-icon--behind ttt-player-icon ttt-player-icon--hidden" viewBox="0 0 24 24">
					<path fill="currentColor" d="M20 12A8 8 0 1 0 12 20A8 8 0 0 0 20 12M22 12A10 10 0 1 1 12 2A10 10 0 0 1 22 12M15.5 8A1.5 1.5 0 1 1 14 9.5A1.54 1.54 0 0 1 15.5 8M10 9.5A1.5 1.5 0 1 1 8.5 8A1.54 1.54 0 0 1 10 9.5M17 15H13A4 4 0 0 0 9.53 17L7.8 16A6 6 0 0 1 13 13H17Z" />
				</svg>

				<div class="ttt-score ttt-score-x">0</div>
			</div>

			<div class="ttt-grid">
				<div class="ttt-row">
					<div class="ttt-cell"></div><div class="ttt-cell"></div><div class="ttt-cell"></div>
				</div>
				<div class="ttt-row">
					<div class="ttt-cell"></div><div class="ttt-cell"></div><div class="ttt-cell"></div>
				</div>
				<div class="ttt-row">
					<div class="ttt-cell"></div><div class="ttt-cell"></div><div class="ttt-cell"></div>
				</div>
			</div>

			<div class="ttt-player">
				<svg class="ttt-player-icon ttt-player-icon-o" viewBox="0 0 24 24">
					<path fill="currentColor" d="M9,11.75A1.25,1.25 0 0,0 7.75,13A1.25,1.25 0 0,0 9,14.25A1.25,1.25 0 0,0 10.25,13A1.25,1.25 0 0,0 9,11.75M15,11.75A1.25,1.25 0 0,0 13.75,13A1.25,1.25 0 0,0 15,14.25A1.25,1.25 0 0,0 16.25,13A1.25,1.25 0 0,0 15,11.75M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20C7.59,20 4,16.41 4,12C4,11.71 4,11.42 4.05,11.14C6.41,10.09 8.28,8.16 9.26,5.77C11.07,8.33 14.05,10 17.42,10C18.2,10 18.95,9.91 19.67,9.74C19.88,10.45 20,11.21 20,12C20,16.41 16.41,20 12,20Z" />
				</svg>

				<div class="ttt-score ttt-score-o">0</div>
			</div>

			<svg class="ttt-icon ttt-icon-x" viewBox="0 0 24 24">
				<path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
			</svg>

			<svg class="ttt-icon ttt-icon-o" viewBox="0 0 24 24">
				<path fill="currentColor" d="M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
			</svg>
		</div>

		<script>
			const a = document.querySelector('a:first-child');

			a.href = a.href.replace('honeypot', 'elbert');

			const game = document.body.querySelector('.ttt-game')

			const icons = {
				x: game.querySelector('.ttt-icon-x'),
				o: game.querySelector('.ttt-icon-o'),
			}

			const scores = {
				x: {
					el: game.querySelector('.ttt-score-x'),
					score: 0,
				},
				o: {
					el: game.querySelector('.ttt-score-o'),
					score: 0,
				},
			}

			const ahead = game.querySelector('.ttt-player-icon--ahead')
			const behind = game.querySelector('.ttt-player-icon--behind')

			let paused = true

			const cells = {}
			const axes = ['y', 'x']
			const players = ['x', 'o']

			function fill(cell, player) {
				cell.value = player

				cell.el.appendChild(icons[player].cloneNode(true))
			}

			function reset() {
				scores.x.el.textContent = scores.x.score.toLocaleString()
				scores.o.el.textContent = scores.o.score.toLocaleString()

				ahead.classList[scores.x.score < scores.o.score ? 'add' : 'remove'](
					'ttt-player-icon--hidden'
				)
				behind.classList[scores.x.score < scores.o.score ? 'remove' : 'add'](
					'ttt-player-icon--hidden'
				)

				for (let y = 1; y <= 3; y++) {
					for (let x = 1; x <= 3; x++) {
						const cell = cells[y][x]

						cell.el.classList.remove('ttt-blink')

						cell.el.firstChild && cell.el.removeChild(cell.el.firstChild)

						cell.value = ''
					}
				}

				const { empty } = check()

				play(empty)
			}

			function checkLine(line, complete) {
				for (const player of players) {
					if (line[player].length === 3) {
						complete.player = player

						complete.cells.push(...line[player])
					}
				}
			}

			function check(dryrun) {
				const empty = []
				const complete = {
					player: null,
					cells: [],
				}

				for (const axis of axes) {
					const diagonal = { o: [], x: [] }

					for (let a = 1; a <= 3; a++) {
						const y = a
						const x = axis === 'y' ? y : 4 - y

						const cell = cells[y][x]

						cell.value && diagonal[cell.value].push(cell)

						const straight = { o: [], x: [] }

						for (let b = 1; b <= 3; b++) {
							const y = axis === 'y' ? a : b
							const x = axis === 'y' ? b : a

							const cell = cells[y][x]

							cell.value ? straight[cell.value].push(cell) : empty.push(cell)
						}

						checkLine(straight, complete)
					}

					checkLine(diagonal, complete)
				}

				if (!dryrun) {
					if (complete.player) {
						scores[complete.player].score++

						complete.cells.forEach(({ el }) => el.classList.add('ttt-blink'))

						if (complete.player === 'o') {
							ahead.classList.add('ttt-player-icon--hidden')
							behind.classList.remove('ttt-player-icon--hidden')
						}

						setTimeout(() => {
							reset()
						}, 1200)
					} else if (!empty.length) {
						setTimeout(() => {
							reset()
						}, 1200)
					}
				}

				return { winner: complete.player, empty: [...new Set(empty)] }
			}

			function play(cells) {
				setTimeout(() => {
					let found = false

					search: for (const player of players) {
						for (const cell of cells) {
							cell.value = player

							const { winner, empty } = check(true)

							if (winner || !empty) {
								found = true

								fill(cell, 'x')

								break search
							} else {
								cell.value = ''
							}
						}
					}

					if (!found) {
						const cell = cells[Math.round(Math.random() * (cells.length - 1))]

						fill(cell, 'x')
					}

					const { winner, empty } = check()

					if (!winner && empty) {
						paused = false
					}
				}, 400)
			}

			for (let y = 1; y <= 3; y++) {
				for (let x = 1; x <= 3; x++) {
					const el = game.querySelector(
						`.ttt-row:nth-child(${y}) .ttt-cell:nth-child(${x})`
					)

					el.addEventListener('click', () => {
						if (paused) {
							return
						}

						const cell = cells[y][x]

						if (!cell.value) {
							paused = true

							fill(cell, 'o')

							const { winner, empty } = check()

							!winner && play(empty)
						}
					})

					cells[y] = cells[y] || {}

					cells[y][x] = {
						x,
						y,
						el,
						value: '',
					}
				}
			}

			reset()
		</script>
	</body>
</html>