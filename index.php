<!DOCTYPE html>
<html>
<head>
	<title>Статистика переглядів</title>
</head>
<body>
	<h1>Кількість переглядів сторінки</h1>
	<?php
	// Шлях до текстового файлу з кількістю показів
	$filepath = 'page_views.txt';

	// Збільшуємо лічильник показів
	function incrementPageViews($filepath) {
		if (file_exists($filepath)) {
			// Відкриваємо файл для читання та запису
			$file = fopen($filepath, 'r+');
			if ($file) {
				// Зчитуємо поточну кількість показів
				$count = fread($file, filesize($filepath));
				$count = intval($count);

				// Збільшуємо кількість показів
				$count++;

				// Повертаємо курсор на початок файлу
				rewind($file);

				// Записуємо нову кількість показів
				fwrite($file, $count);

				// Закриваємо файл
				fclose($file);
			}
		} else {
			// Якщо файл не існує, створюємо його та записуємо першу кількість показів
			$file = fopen($filepath, 'w');
			if ($file) {
				$count = 1;
				fwrite($file, $count);
				fclose($file);
			}
		}
	}

	// Викликаємо функцію для збільшення кількості показів
	incrementPageViews($filepath);

	// Виводимо кількість показів
	echo '<p>Кількість переглядів: ' . file_get_contents($filepath) . '</p>';
	?>
</body>
</html>
