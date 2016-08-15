# groupItPdo

  groupIt делит результат вывода pdoResources на группы блоков.

**Параметры**  
* &groupN на какое число делить, по-умолчанию 3.
* &tplWrapper шаблон для обертки, по-умолчанию @INLINE <div>[[+wrapper]]</div>.

**Использование**  
[[groupIt? &groupN=`3` &tplWrapper=`@INLINE <div>[[+wrapper]]</div>` ]]


# groupIt
Убогая версия =)

**Параметры**:
* **&wrapperOn** вкл/выкл обертку, по-умолчанию 0
* **&wrapperTag** тег обертки, по-умолчанию div
* **&wrapperClass** класс обертки
* **&wrapperId** id обертки
* **&groupN** на какое число делить, по-умолчанию 3
* **&groupTag** тег группы, по-умолчанию div
* **&groupClass** класс группы
* **&snippet** сниппет, по-умолчанию pdoResources  


**Использования:**  
[[groupIt? &wrapper=`1` &wrapperClass=`Class` &wrapperId=`id` &wrapperTag=`div` &groupN=`3` &groupTag=`div` &groupClass=`ClassGroup` &snippet=`pdoResources`]]
