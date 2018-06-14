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
	$start = $from;
	$path = [$from];
	$weight = 0;
	$processing = true;
	$i = 0;
	$max = count($graph) *2;

	while ($processing) {

		if ($from == $to) {
			echo 'Путь из '.$start.' в '.$to.' найден длиной в '.$weight.'<br>';
			print "<pre>";
			print_r($path);
			print "</pre>";
			$processing = false;		
		}

		// step define
		if (count($path)) {
			$first = $path[count($path)-1];
			asort($graph[$first]);
			// if isset direct path to finish
			if (array_key_exists($to, $graph[$first])) {
				$path[] = $to;
				$weight += $graph[$first][$to];
				$from = $to;
			} else {
				foreach ($graph[$first] as $key => $value) {
					if (!in_array($key, $path)) {
						$path[] = $key;
						$weight += $value;
						break;
					}
				}
				$from = $key;
			}
		} else {
			echo '<br>Путь не найден.';
		}

		$i++;
		if ($i == $max)
			$processing = false;			
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
connectVertex($graph, $a, $e, 3);
connectVertex($graph, $b, $f, 3);
connectVertex($graph, $b, $c, 3);
connectVertex($graph, $c, $f, 4);
connectVertex($graph, $c, $d, 2);
connectVertex($graph, $d, $f, 2);
connectVertex($graph, $d, $e, 4);
connectVertex($graph, $e, $f, 1);

getPath($graph, $a, $c);