			/* переключение главного изображения */
			function setImg(thumb, src) {
				const img = document.getElementById('mainImg');
				img.style.animation = 'none';
				img.offsetHeight;
				img.style.animation = '';
				img.src = src;
				document.querySelectorAll('.product-gallery__thumb').forEach(t => t.classList.remove('active'));
				thumb.classList.add('active');
			}

			/* лайтбокс */
			function openLightbox() {
				const src = document.getElementById('mainImg').src;
				document.getElementById('lightboxImg').src = src;
				document.getElementById('lightbox').classList.add('open');
				document.body.style.overflow = 'hidden';
			}

			function closeLightbox(e) {
				if (e && e.target !== document.getElementById('lightbox') && !e.target.closest('.lightbox__close')) return;
				document.getElementById('lightbox').classList.remove('open');
				document.body.style.overflow = '';
			}

			document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox({}); });

			/* счётчик количества */
			function changeQty(delta) {
				const input = document.getElementById('qtyInput');
				const val = Math.max(1, Math.min(99, parseInt(input.value || 1) + delta));
				input.value = val;
			}