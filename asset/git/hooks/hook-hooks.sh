#!/usr/bin/env bash

## Hook the hooks
#
# @created    2023-12-25
# @copied     2024-03-31  from my private "core.hooksPath".
# @version    1.0
# @package    op
# @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
# @copyright  Tomoaki Nagahara All right reserved.

# Init
GIT_ROOT=`git rev-parse  --show-toplevel`
HOOK_NAME=$1 # `basename $0`
LOCAL_HOOK="${GIT_ROOT}/.git/hooks/${HOOK_NAME}"

# Checking if hook exists.
if [ -e $LOCAL_HOOK ]; then
  echo "Execute to --> ${LOCAL_HOOK}"
  $LOCAL_HOOK
fi
