#!/bin/bash
# OkiTech テーマを GitHub にプッシュするスクリプト
# 使い方: ./push-to-github.sh YOUR_GITHUB_USERNAME YOUR_REPO_NAME
# 例: ./push-to-github.sh myuser okitech-theme

set -e

if [ -z "$1" ] || [ -z "$2" ]; then
  echo "使い方: $0 <GitHubユーザー名> <リポジトリ名>"
  echo "例: $0 myuser okitech-theme"
  exit 1
fi

GITHUB_USER=$1
REPO_NAME=$2

echo "=== OkiTech テーマを GitHub にプッシュします ==="
echo "リポジトリ: https://github.com/${GITHUB_USER}/${REPO_NAME}"
echo ""

# 既存の .git があれば削除して初期化し直す
if [ -d .git ]; then
  echo "既存の git リポジトリを削除して初期化します..."
  rm -rf .git
fi

git init
git add .
git commit -m "Initial commit: OkiTech WordPress theme"
git branch -M main
git remote add origin "https://github.com/${GITHUB_USER}/${REPO_NAME}.git"
echo ""
echo "リモートを追加しました。'git push -u origin main' を実行してプッシュしてください。"
echo "認証が必要な場合は GitHub の Personal Access Token を入力します。"
echo ""
git push -u origin main

echo ""
echo "✅ プッシュ完了！"
