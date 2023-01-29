.PHONY:clean show
SRC=$(wildcard *.c)
TARGETS=$(patsubst %.c,%,$(SRC))
OBJS=$(patsubst %.c,%.o,$(SRC))

$(TARGET):$(OBJS)

show:
	echo $(SRC)
	echo $(OBJS)
	echo $(TARGETS)
clean:
	$(RM) *.o $(TARGETS)