
cd ..

::Clears the cache
php console cache:clear --env=dev
::php console cache:pool:clear                        Clears cache pools
::php console cache:warmup                            Warms up an empty cache
::php console doctrine:cache:clear-collection-region  Clear a second-level cache collection region.
::php console doctrine:cache:clear-entity-region      Clear a second-level cache entity region.
::php console doctrine:cache:clear-metadata           Clears all metadata cache for an entity manager
::php console doctrine:cache:clear-query              Clears all query cache for an entity manager
::php console doctrine:cache:clear-query-region       Clear a second-level cache query region.
::php console doctrine:cache:clear-result             Clears result cache for an entity manager

pause