-- Primeira forma
SELECT D.dept_name AS Departamento,
CONCAT(E.first_name, ' ', E.last_name) AS Nome,
DATEDIFF(IFNULL(T.to_date, DATE(NOW())), T.from_date) AS Dias
FROM dept_emp AS T
INNER JOIN departments AS D ON D.dept_no = T.dept_no
INNER JOIN employees AS E ON E.emp_no = T.emp_no
ORDER BY dias DESC
LIMIT 10

-- Segunda forma
SELECT D.dept_name AS departamento,
CONCAT(E.first_name, ' ', E.last_name) AS nome,
X.dias
FROM
(
SELECT DATEDIFF(IFNULL(T.to_date, DATE(NOW())), T.from_date) AS dias, T.emp_no, T.dept_no FROM dept_emp AS T
ORDER BY dias DESC
LIMIT 10
) AS X
INNER JOIN departments AS D ON D.dept_no = X.dept_no
INNER JOIN employees AS E ON E.emp_no = X.emp_no

-- Terceira forma
SELECT
(SELECT D.dept_name FROM departments AS D WHERE D.dept_no = X.dept_no) AS departamento,
(SELECT CONCAT(E.first_name, ' ', E.last_name) FROM employees AS E WHERE E.emp_no = X.emp_no) AS nome,
X.dias
FROM
(
SELECT DATEDIFF(IFNULL(T.to_date, DATE(NOW())), T.from_date) AS dias, T.emp_no, T.dept_no FROM dept_emp AS T
ORDER BY dias DESC
LIMIT 10
) AS X