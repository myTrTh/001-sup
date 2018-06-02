<?php

echo 'Рекурсия<br><br>';

function sumRecurse(array $list)
{
	if (count($list) == 1) {
		return $list[0];
	} else {
		return $list[0] + sumRecurse(array_slice($list, 1));
	}
}

echo sumRecurse([1, 1, 2, 8]);

