for rol in $(grep -r "ROLE_" src/Par3/GolfEnLaNubeBundle/* | sed -s "s/.*ROLE_\([^']*\).*/ROLE_\1/g"|sort|uniq); do php app/console fos:user:promot  dan $rol; done
