cmake_minimum_required(VERSION 3.17)

get_filename_component(PROJECT_NAME ${CMAKE_CURRENT_SOURCE_DIR} NAME)

string(REPLACE " " "_" PROJECT_NAME ${PROJECT_NAME})

project(${PROJECT_NAME} C)

set(CMAKE_C_STANDARD 99)


aux_source_directory(. DIR_SRCS)
aux_source_directory("fun" DIR_SRCS)



add_executable(${PROJECT_NAME}  ${DIR_SRCS} )

target_compile_definitions(${PROJECT_NAME} PUBLIC DEBUG)