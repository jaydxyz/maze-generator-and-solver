<?php
// Function to generate a random maze using the Recursive Backtracking algorithm
function generateMaze($width, $height) {
    $maze = array_fill(0, $height, array_fill(0, $width, '#'));

    function carve(&$maze, $x, $y) {
        $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]];
        shuffle($directions);

        foreach ($directions as $dir) {
            $nx = $x + $dir[0] * 2;
            $ny = $y + $dir[1] * 2;

            if ($nx >= 0 && $nx < count($maze[0]) && $ny >= 0 && $ny < count($maze)) {
                if ($maze[$ny][$nx] == '#') {
                    $maze[$y + $dir[1]][$x + $dir[0]] = ' ';
                    $maze[$ny][$nx] = ' ';
                    carve($maze, $nx, $ny);
                }
            }
        }
    }

    $maze[1][1] = ' ';
    carve($maze, 1, 1);
    $maze[1][0] = ' ';
    $maze[$height - 2][$width - 1] = ' ';

    return $maze;
}

// Function to solve the maze using Depth-First Search (DFS)
function solveMaze(&$maze, $startX, $startY, $endX, $endY) {
    $rows = count($maze);
    $cols = count($maze[0]);
    $visited = array_fill(0, $rows, array_fill(0, $cols, false));
    $path = [];

    function dfs(&$maze, $x, $y, $endX, $endY, &$visited, &$path) {
        if ($x == $endX && $y == $endY) {
            $path[] = [$x, $y];
            return true;
        }

        $visited[$y][$x] = true;
        $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]];

        foreach ($directions as $dir) {
            $nx = $x + $dir[0];
            $ny = $y + $dir[1];

            if ($nx >= 0 && $nx < count($maze[0]) && $ny >= 0 && $ny < count($maze)) {
                if (!$visited[$ny][$nx] && $maze[$ny][$nx] == ' ') {
                    if (dfs($maze, $nx, $ny, $endX, $endY, $visited, $path)) {
                        $path[] = [$x, $y];
                        return true;
                    }
                }
            }
        }

        return false;
    }

    dfs($maze, $startX, $startY, $endX, $endY, $visited, $path);
    return array_reverse($path);
}

// Function to display the maze and solution path
function displayMaze($maze, $path) {
    foreach ($path as $pos) {
        $maze[$pos[1]][$pos[0]] = '*';
    }

    foreach ($maze as $row) {
        echo implode('', $row) . "\n";
    }
}

// Get user input for maze dimensions
$width = isset($_GET['width']) ? intval($_GET['width']) : 21;
$height = isset($_GET['height']) ? intval($_GET['height']) : 21;

// Validate user input
if ($width % 2 == 0) $width++;
if ($height % 2 == 0) $height++;
if ($width < 5) $width = 5;
if ($height < 5) $height = 5;

// Generate and solve the maze
$startTime = microtime(true);
$maze = generateMaze($width, $height);
$genTime = microtime(true) - $startTime;

$startTime = microtime(true);
$path = solveMaze($maze, 1, 1, $width - 2, $height - 2);
$solveTime = microtime(true) - $startTime;

// Display the maze and solution
displayMaze($maze, $path);

// Output statistics
echo "\nMaze Dimensions: " . $width . "x" . $height . "\n";
echo "Generation Time: " . number_format($genTime, 4) . " seconds\n";
echo "Solving Time: " . number_format($solveTime, 4) . " seconds\n";
?>
