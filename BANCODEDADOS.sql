-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Abr-2021 às 19:03
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testephp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_models`
--

CREATE TABLE `funcionario_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `funcionario_models`
--

INSERT INTO `funcionario_models` (`id`, `cpf`, `cargo`, `nascimento`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `user_id`, `admin_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '118.590.056-08', 'chefe 1234', '1997-03-05', '32410-059', 'Rua Ana Maria de Jesus', 'Nossa Senhora de Fátima', 'Ibirité', 'MG', 2, NULL, NULL, '2021-04-28 23:04:55', '2021-04-29 00:03:46'),
(2, '000.715.416-08', '1231231', '1995-04-28 00:00:00', '32410-059', 'Rua Ana Maria de Jesus', 'Nossa Senhora de Fátima', 'Ibirité', 'MG', 3, 1, NULL, '2021-04-29 00:15:10', '2021-04-29 00:15:10'),
(3, '309.712.550-75', 'chefe asdasdad', '2000-04-23 00:00:00', '32410-059', 'Rua Ana Maria de Jesus', 'Nossa Senhora de Fátima', 'Ibirité', 'MG', 4, 1, NULL, '2021-04-29 00:17:30', '2021-04-29 00:17:30'),
(4, '955.690.180-93', 'chefe', '1970-04-29 00:00:00', '32410-059', 'Rua Ana Maria de Jesus', 'Nossa Senhora de Fátima', 'Ibirité', 'MG', 5, 1, NULL, '2021-04-29 01:39:55', '2021-04-29 01:39:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2021_04_22_182916_create_ponto_models_table', 1),
(30, '2021_04_22_182940_create_funcionario_models_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto_models`
--

CREATE TABLE `ponto_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ponto_models`
--

INSERT INTO `ponto_models` (`id`, `data`, `hora`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2021-04-28', '19:17:00', 4, NULL, '2021-04-28 22:17:16', '2021-04-28 22:17:16'),
(2, '2021-04-28', '19:17:00', 4, NULL, '2021-04-28 22:17:21', '2021-04-28 22:17:21'),
(3, '2021-04-28', '19:43:00', 5, NULL, '2021-04-28 22:43:57', '2021-04-28 22:43:57'),
(4, '2021-04-28', '19:44:00', 5, NULL, '2021-04-28 22:44:02', '2021-04-28 22:44:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `administrador` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `administrador`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'brenner cunha', 'brennersc@gmail.com', NULL, '$2y$10$tEd87rUAynHbypRuDqh5vuTdK1YY9uDgZj7bgHt1ySXxDWNgI6Wi6', 1, 1, 'T0cnwhLMEt1ATb19srLo1xsSn74CmKDQemrDlq1ef0g6yk3F3IohxWL9esFH', NULL, '2021-04-28 22:43:10', '2021-04-28 22:43:10'),
(2, 'ARIANA MARIE 1', 'brennersilvacunha@hotmail.com', NULL, '$2y$10$.Imu6Gx5VlrsAwJ/pfWFqOozADe0DoEJw6hFU2uc3s919VaJvwoAK', 1, 0, NULL, NULL, '2021-04-28 23:04:41', '2021-04-28 23:51:05'),
(3, 'teste', 'lucas_souzaneri@outlook.com', NULL, '$2y$10$ZtlmOE9lhk9Mxf61QlxgDOWyRF3qTdKrmfl5I1YJFpyuEbcTvY2vu', 1, 0, NULL, NULL, '2021-04-29 00:15:10', '2021-04-29 00:15:50'),
(4, 'brenner cunha 3', 'thamara.teixeira@cbmsa.com.br', NULL, '$2y$10$D6ufbekt0VKbyhePF9k2Fu4Wz0JVwFQbZPRFHXjxh8fqoXO8SnNUq', 1, 0, NULL, '2021-04-29 01:43:32', '2021-04-29 00:17:30', '2021-04-29 01:43:32'),
(5, 'LUCAS', 'LUCAS@GMAIL.COM', NULL, '$2y$10$ZaIIAf8pKYn6U88kpZx1t.mCxse5XCuFdO5soB2aAM9bvqAS6ucCi', 1, 0, NULL, NULL, '2021-04-29 01:39:55', '2021-04-29 01:39:55');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `funcionario_models`
--
ALTER TABLE `funcionario_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_models_admin_id_foreign` (`admin_id`),
  ADD KEY `funcionario_models_user_id_foreign` (`user_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `ponto_models`
--
ALTER TABLE `ponto_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ponto_models_user_id_foreign` (`user_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario_models`
--
ALTER TABLE `funcionario_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `ponto_models`
--
ALTER TABLE `ponto_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `funcionario_models`
--
ALTER TABLE `funcionario_models`
  ADD CONSTRAINT `funcionario_models_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `funcionario_models_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `ponto_models`
--
ALTER TABLE `ponto_models`
  ADD CONSTRAINT `ponto_models_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
