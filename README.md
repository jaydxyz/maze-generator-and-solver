# PHP Maze Generator and Solver

This project is a PHP script that generates a random maze of a specified size and solves it using a pathfinding algorithm. The script outputs the generated maze as ASCII art and displays the solution path.

## Features

- Generates a random maze using the Recursive Backtracking algorithm
- Solves the generated maze using Depth-First Search (DFS) algorithm
- Displays the maze as ASCII art, including the solution path
- Accepts user input for maze dimensions through query parameters
- Provides statistics such as maze dimensions, generation time, and solving time
- Implements error handling and validation for user input

## Requirements

- PHP 5.6 or higher
- Web server environment (e.g., Apache, Nginx)

## Usage

1. Clone the repository or download the `maze.php` script.

2. Place the `maze.php` script in your web server's document root directory.

3. Access the script through a web browser by providing the desired maze dimensions as query parameters. For example:
   ```
   http://localhost/maze.php?width=21&height=21
   ```

   The `width` and `height` parameters specify the number of columns and rows in the maze, respectively. If not provided, the default dimensions of 21x21 will be used.

4. The script will generate a random maze, solve it, and display the maze with the solution path as ASCII art. It will also output the maze dimensions, generation time, and solving time.

## Customization

You can customize the script by modifying the following aspects:

- Maze Generation Algorithm: The script currently uses the Recursive Backtracking algorithm to generate the maze. You can replace it with other maze generation algorithms, such as Prim's algorithm or Kruskal's algorithm, by modifying the `generateMaze` function.

- Pathfinding Algorithm: The script solves the maze using Depth-First Search (DFS) algorithm. You can experiment with other pathfinding algorithms, such as Breadth-First Search (BFS) or A* algorithm, by updating the `solveMaze` function.

- ASCII Art Representation: The script represents walls as '#' and paths as ' '. You can customize the characters used for walls, paths, and the solution path by modifying the `displayMaze` function.

## Examples

Here are a few examples of generated mazes and their solutions:

1. 21x21 Maze:
   ```
   http://localhost/maze.php?width=21&height=21
   ```

2. 35x35 Maze:
   ```
   http://localhost/maze.php?width=35&height=35
   ```

3. 51x51 Maze:
   ```
   http://localhost/maze.php?width=51&height=51
   ```

## License

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).
