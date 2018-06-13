<?php

echo 'Нахождение кратчайшего пути на графе<br><br>';

function createGraph(): array
{
	$graph = [];
	return $graph;
}

function addVertex(array &$graph, string $vertex)
{
	$graph[$vertex] = [];
}

function connectVertex(array &$graph, string $from, string $to, int $weight)
{
	$graph[$from][$to] = $weight;
	$graph[$to][$from] = $weight;
}

function getPath(&$graph, $from, $to)
{
	$path = [];
	$path_weight = 0;
	$process = true;
	asort($graph[$from]);
	while ($process) {
		if ($graph[$from][$to]) {
			$path_weight = $graph[$from][$to];
			echo 'Решение найдено. Кратчайший путь составляет: '.$path_weight;
			$process = false;
		} else {
			asort($graph[$from]);

			foreach ($graph[$from] as $key => $value) {
				$path[$from] = $key;
				$path_weight += $value;
				break;
			}
			array_shift($graph[$from]);

		}
		echo 'actual path weight: '.$path_weight.'<br>';
		print "<pre>";
		print_r($path);
		print "</pre>";
		break;
	}
}

$graph = createGraph();
$a = "A";
$b = "B";
$c = "C";
$d = "D";
$e = "E";
$f = "F";
addVertex($graph, $a);
addVertex($graph, $b);
addVertex($graph, $c);
addVertex($graph, $d);
addVertex($graph, $e);
addVertex($graph, $f);

connectVertex($graph, $a, $b, 4);
connectVertex($graph, $a, $f, 2);
connectVertex($graph, $a, $e, 2);
connectVertex($graph, $b, $f, 4);
connectVertex($graph, $b, $c, 3);
connectVertex($graph, $c, $f, 4);
connectVertex($graph, $c, $d, 2);
connectVertex($graph, $d, $f, 3);
connectVertex($graph, $d, $e, 1);
connectVertex($graph, $e, $f, 1);

getPath($graph, $a, $c);

print "<pre>";
print_r($graph);
print "</pre>";